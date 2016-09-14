<?php

class modelMultilang extends cmsModel {

	public $table_prefix = 'con_';
	public $ml_table_prefix = 'multilang_';
	public $ml_con_table_prefix = 'multilang_con_';

	public function getContentItemForm($ctype) {
		$form = new cmsForm();
		$fieldset_id = $form->addFieldset();

		$content_model = cmsCore::getModel('content');

		$content_model->orderBy('ordering');
		$fields = $content_model->filterIn('type', $this->getAllowedFieldTypes())->getContentFields($ctype['name']);

		$fieldsets = cmsForm::mapFieldsToFieldsets($fields, function($field, $user) {
					if ($field['is_system']) {
						return false;
					}

					return true;
				});

		foreach ($fieldsets as $fieldset) {
			$fieldset_id = $form->addFieldset($fieldset['title']);

			foreach ($fieldset['fields'] as $field) {
				$form->addField($fieldset_id, $field['handler']);
			}
		}

		return $form;
	}

	public function addSeoFields($form) {
		$form->addFieldset('SEO', 'seo');
		$form->addField('seo', new fieldText('seo_keys', array(
			'title' => LANG_SEO_KEYS,
		)));
		$form->addField('seo', new fieldText('seo_desc', array(
			'title' => LANG_SEO_DESC,
		)));
		return $form;
	}

	public function getContentTableStruct() {

		return array(
			'id' => array('type' => 'primary'),
			'item_id' => array('type' => 'int', 'index' => true, 'unsigned' => true),
			'user_id' => array('type' => 'int', 'index' => 'user_id', 'composite_index' => 0, 'unsigned' => true),
			'lang' => array('type' => 'varchar', 'index' => true, 'size' => 6),
			'title' => array('type' => 'varchar', 'size' => 100, 'fulltext' => true),
			'content' => array('type' => 'text'),
			'seo_keys' => array('type' => 'text'),
			'seo_desc' => array('type' => 'text'),
			'date_last_modified' => array('type' => 'timestamp'),
		);
	}

	public function getAllowedFieldTypes() {
		return array('caption', 'html', 'string', 'text');
	}

	public function addContentField($ctype_name, $field) {
		$table_name = $this->ml_con_table_prefix . $ctype_name;
		$table_exists = $this->db->query("SHOW TABLES LIKE '{#}{$table_name}'");

		if (!$table_exists->num_rows) {
			$this->addContentTable($ctype_name);
		}

		$field_class = 'field' . string_to_camel('_', $field['type']);
		$field_parser = new $field_class(null, (isset($field['options']) ? array('options' => $field['options']) : null));

		if ($this->db->isFieldExists($table_name, $field['name']) || !in_array($field['type'], $this->getAllowedFieldTypes())) {
			return;
		}

		$sql = "ALTER TABLE {#}{$table_name} ADD `{$field['name']}` {$field_parser->getSQL()} AFTER `content`";
		$this->db->query($sql);
	}

	public function updateContentField($field, $field_old, $ctype_name, $content_model) {
		$table_name = $this->ml_con_table_prefix . $ctype_name;

		if ($field_old['is_system'] || !in_array($field['type'], $this->getAllowedFieldTypes()) || !$this->db->isFieldExists($table_name, $field['name'])) {
			return;
		}

		$new_lenght = ((isset($field['options']) && !empty($field['options']['max_length'])) ? $field['options']['max_length'] : false);
		$old_lenght = ((isset($field_old['options']) && !empty($field_old['options']['max_length'])) ? $field_old['options']['max_length'] : false);

		$field_class = 'field' . string_to_camel('_', $field['type']);
		$field_handler = new $field_class(null, (isset($field['options']) ? array('options' => $field['options']) : null));

		if (($field_old['name'] != $field['name']) || ($field_old['type'] != $field['type']) || ($new_lenght != $old_lenght)) {
			if ($field_old['type'] != $field['type']) {
				$this->db->dropIndex($table_name, $field_old['name']);
			}
			$sql = "ALTER TABLE `{#}{$table_name}` CHANGE `{$field_old['name']}` `{$field['name']}` {$field_handler->getSQL()}";
			$this->db->query($sql);
		}
	}

	public function addContentTable($ctype_name) {
		$table_name = $this->ml_con_table_prefix . $ctype_name;
		$table_struct = $this->getContentTableStruct();
		$this->db->createTable($table_name, $table_struct);
	}

	public function addContentTables($ctype_name) {
		$content_model = cmsCore::getModel('content');

		$table_exists = $this->db->query("SHOW TABLES LIKE '{#}{$table_name}'");

		if (!$table_exists->num_rows) {
			$this->addContentTable($ctype_name);
		}

		$fields = $content_model->getContentFields($ctype_name);
		foreach ($fields as $field) {
			$this->addContentField($ctype_name, $field);
		}
	}

	public function getContentItems($ctype_name, $lang) {
		$table_name = $this->table_prefix . $ctype_name;
		$this->selectOnly('i.id, i.title, t.item_id as translated');
		$this->joinLeft($this->ml_con_table_prefix . $ctype_name, 't', 't.item_id = i.id and t.lang = "' . $lang . '"');
		return $this->get($table_name, function($item, $model) use ($ctype_name) {
					$item['parent'] = $ctype_name;
					return $item;
				});
	}

	public function getMenuItems($menu_id = false, $parent_id = false, $lang) {
		$this->selectOnly('i.id, i.title, t.item_id as translated');
		$this->joinLeft($this->ml_table_prefix . 'menu', 't', 't.item_id = i.id and t.parent = ' . $menu_id . ' and t.lang = "' . $lang . '"');
		if ($menu_id !== false) {
			$this->filterEqual('menu_id', $menu_id);
		}
		if ($parent_id !== false) {
			$this->filterEqual('parent_id', $parent_id);
		}
		return $this->get('menu_items', function($item, $model) use ($menu_id) {
					$item['parent'] = $menu_id;
					return $item;
				});
	}

	public function getWidgetItems($id, $lang) {
		$this->selectOnly('i.id, i.title, i.template, t.item_id as translated');
		$this->joinLeft($this->ml_table_prefix . 'widgets', 't', 't.item_id = i.id and t.parent = ' . $id . ' and t.lang = "' . $lang . '"');
		return $this->filterEqual('widget_id', $id)->get('widgets_bind', function($item, $model) use ($id) {
					$item['parent'] = $id;
					return $item;
				});
	}

	public function getCtypes($lang) {
		$this->selectOnly('i.id, i.title, t.item_id as translated');
		$this->joinLeft($this->ml_table_prefix . 'ctypes', 't', 't.item_id = i.id and t.lang = "' . $lang . '"');
		return $this->get('content_types');
	}

	public function getFieldItems($ctype, $lang) {
		$this->selectOnly('i.title, f.name as name');
		$this->joinLeft($this->table_prefix . $ctype['name'] . '_fields', 'f', 'f.id = i.item_id');
		$this->filterEqual('parent', $ctype['name'])->filterEqual('lang', $lang);
		return $this->get($this->ml_table_prefix . 'fields', false, 'name');
	}

	public function getOriginalItem($table_name, $parent, $id) {
		switch ($table_name) {
			case 'fields':
				$table_name = $this->table_prefix . $parent . '_fields';
				break;
			case 'contents':
				$table_name = $this->table_prefix . $parent;
				break;
			case 'menu':
				$table_name = 'menu_items';
				break;
			case 'widgets':
				$table_name = 'widgets_bind';
				break;
			case 'ctypes':
				$table_name = 'content_types';
				break;
		}
		return $this->getItemById($table_name, $id);
	}

	public function getReadyItem($table, $parent, $item_id) {
		if ($parent) {
			$this->filterEqual('parent', $parent);
		}
		return $this->filterEqual('item_id', $item_id)->getItem($table);
	}

	public function addTranslate($data, $table) {
		return $this->insert($table, $data);
	}

	public function updTranslate($data, $id, $table) {
		return $this->update($table, $id, $data);
	}

	public function getAutoLang() {
		$auto_lang = '';
		$config = cmsConfig::getInstance();
		foreach (cmsCore::getLanguages() as $l) {
			if ($l != $config->cfg_language) {
				$auto_lang = $l;
				break;
			}
		}

		return $auto_lang;
	}

	public function deleteController($id) {

		$widget = $this->getItemByField('widgets', 'controller', 'multilang');
		if ($widget) {
			$this->delete('widgets_bind', $widget['id'], 'widget_id');
			$this->delete('widgets', $widget['id']);
		}
		$this->db->dropTable($this->ml_con_table_prefix . '*');
		$this->db->dropTable($this->ml_table_prefix . 'ctypes');
		$this->db->dropTable($this->ml_table_prefix . 'menu');
		$this->db->dropTable($this->ml_table_prefix . 'widgets');
		return parent::deleteController($id);
	}

}
