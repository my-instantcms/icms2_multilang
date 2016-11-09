<?php

class formMultilangContents extends cmsForm {

    public function init($ctype_name) {
		
		$model = cmsCore::getModel('content');
		
		$ctype = $model->getContentTypeByName($ctype_name);
        if (!$ctype) { cmsCore::error404(); }
		
		$fields = $model->getContentFields($ctype['name']);
		if (!$fields) { cmsCore::error404(); }
		
		$supports = array('caption', 'string', 'html', 'text');
		
		$ready_fields = $model->db->getTableFields('multilang_con_' . $ctype['name']);
		
		$fieldsets = cmsForm::mapFieldsToFieldsets($fields, function($field) use ($supports){

            if ($field['is_system']) { return false; }
			
			if (!in_array($field['type'], $supports)) { return false; }

            return true;

        });
		
		$form = array();
        $form[0] = array(
			'type' => 'fieldset',
			'childs' => array()
		);
		
		foreach($fieldsets as $fieldset){

            foreach($fieldset['fields'] as $field){
				if(!in_array($field['name'], $ready_fields)){

					if($field['type'] == 'html' || $field['type'] == 'text'){
						$attr = 'text NULL DEFAULT NULL';
					} else {
						$attr = 'VARCHAR(255) NULL DEFAULT NULL';
					}

					$sql = "ALTER TABLE `{#}multilang_con_{$ctype['name']}` ADD `{$field['name']}` {$attr};";
					$model->db->query($sql);
				}

                $form[0]['childs'][] = $field['handler'];

            }

        }
		
		$form[1] = array(
			'type' => 'fieldset',
			'title' => LANG_SEO,
			'childs' => array()
		);
			$form[1]['childs'][] = new fieldString('seo_title', array(
				'title' => LANG_SEO_TITLE,
				'options'=>array(
					'max_length'=> 256,
					'show_symbol_count'=>true
				)
			));
			 $form[1]['childs'][] = new fieldString('seo_keys', array(
				'title' => LANG_SEO_KEYS,
				'hint' => LANG_SEO_KEYS_HINT,
				'options'=>array(
					'max_length'=> 256,
					'show_symbol_count'=>true
				)
			));
			 $form[1]['childs'][] = new fieldText('seo_desc', array(
				'title' => LANG_SEO_DESC,
				'hint' => LANG_SEO_DESC_HINT,
				'options'=>array(
					'max_length'=> 256,
					'show_symbol_count'=>true
				)
			));

        return $form;

    }

}