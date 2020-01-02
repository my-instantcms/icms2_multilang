<?php

class modelMultilang extends cmsModel {
	
	public $table_prefix = 'con_';
	public $supports = array('caption', 'string', 'html', 'text');
	
	public function getObject($object){
		
		switch($object) {			
			case 'contents':
				$this->useCache('content.types');
				return $this->selectOnly('i.id, i.name, i.title')->get('content_types');
				break;
			
			case 'cats':
				$this->useCache('content.types');
				return $this->selectOnly('i.id, i.name, i.title')->get('content_types');
				break;
				
			case 'menu':
				$this->useCache("menu.menus");
				return $this->selectOnly('i.id, i.title')->get('menu');
				break;
				
			case 'widgets':
				return $this->selectOnly('i.id, i.title')->get('widgets');
				break;
			
			case 'fields':
				$this->useCache('content.types');
				return $this->selectOnly('i.id, i.name, i.title')->get('content_types');
				break;
				
			case 'datasets':
				$this->useCache('content.types');
				return $this->selectOnly('i.id, i.title')->get('content_types');
				break;
				
			default: return false;
		}
		
	}
	
	public function getItemsCount($object, $item_id, $parent_id){
		
		switch($object) {			
			case 'contents':
				$category = $this->getCategory($item_id, $parent_id ? $parent_id : 1);
				if(!$category){return false;}
				$this->useCache("content.list.{$item_id}")->filterCategory($item_id, $category, true);
				return $this->getCount($this->table_prefix  . $item_id);
				break;
				
			case 'cats':
				$category = $this->getCategory($item_id, $parent_id ? $parent_id : 1);
				if(!$category){return false;}
				$this->useCache('content.categories')->filterCategory($item_id, $category, true);
				return $this->getCount($this->table_prefix  . $item_id . '_cats');
				break;
				
			case 'menu':
				$this->useCache('menu.items')->filterEqual('menu_id', $item_id)->filterEqual('parent_id', $parent_id);
				return $this->getCount('menu_items');
				break;
				
			case 'widgets':
				return $this->useCache('widgets.bind')->filterEqual('i.widget_id', $item_id)->getCount('widgets_bind');
				break;
				
			case 'ctypes':
				return $this->useCache('content.types')->getCount('content_types');
				break;
				
			case 'fields':
				return $this->useCache('content.fields.' . $item_id)->getCount($this->table_prefix  . $item_id . '_fields');
				break;
				
			case 'datasets':
				return $this->useCache('content.datasets')->filterEqual('i.ctype_id', $item_id)->getCount('content_datasets');
				break;
				
			default: return false;
		}
		
	}
	
	public function getItems($object, $item_id, $parent_id, $lang){
		
		switch($object) {			
			case 'contents':
				$is_table_exists = $this->db->query("SELECT id FROM {#}multilang_con_" . $item_id, false, true) ? 1 : 0;
				if (!$is_table_exists) {

					$create_table = $this->createConTable($item_id, true);

				}

				$this->useCache("content.list.{$item_id}")->selectOnly('i.id, i.title, t.item_id as translated');
				$this->joinLeft('multilang_con_' . $item_id, 't', 't.item_id = i.id and t.lang = "'.$lang.'"');
				return $this->orderBy('i.date_pub', 'DESC')->get($this->table_prefix . $item_id, function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					return $item;
				});
				break;
			
			case 'cats':
				$this->useCache('content.categories')->selectOnly('i.id, i.title, t.item_id as translated')->filterGt('i.parent_id', 0)->joinLeft('multilang_cats', 't', 't.item_id=i.id and t.parent="'.$item_id.'" and t.lang="'.$lang.'"');
				return $this->get($this->table_prefix . $item_id . '_cats', function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					return $item;
				});
				break;
				
			case 'menu':
				$this->useCache('menu.items')->selectOnly('i.id, i.title, t.item_id as translated');
				$this->joinLeft('multilang_menu', 't', 't.item_id=i.id and t.parent='.$item_id.' and t.lang="'.$lang.'"');
				if($item_id !== false){$this->filterEqual('menu_id', $item_id);}
				if ($parent_id !== false){$this->filterEqual('parent_id', $parent_id);}
				return $this->orderBy('ordering', 'asc')->get('menu_items', function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					return $item;
				});
				break;
				
			case 'widgets':
				$this->useCache('widgets.bind')->selectOnly('i.id, i.title, t.item_id as translated, p.id as pid, p.template');
				$this->joinLeft('multilang_widgets', 't', 't.item_id=i.id and t.lang="'.$lang.'"');
				$this->joinLeft('widgets_bind_pages', 'p', 'p.bind_id=i.id');
				return $this->filterEqual('widget_id', $item_id)->get('widgets_bind', function($item, $model) use ($item_id){
					$item['parent'] = $item['pid'];
					return $item;
				});
				break;

			case 'ctypes':	
				$this->useCache('content.types')->selectOnly('i.id, i.title, t.item_id as translated');
				$this->joinLeft('multilang_ctypes', 't', 't.item_id = i.id and t.lang = "'.$lang.'"');
				return $this->get('content_types', function($item, $model){
					$item['parent'] = 0;
					return $item;
				});
				break;
				
			case 'fields':	
				$this->useCache('content.fields.' . $item_id)->selectOnly('i.id, i.title, i.name, t.item_id as translated');
				$this->joinLeft('multilang_fields', 't', 't.item_id = i.name and t.parent="'.$item_id.'" and t.lang = "'.$lang.'"');
				return $this->orderBy('ordering')->get($this->table_prefix  . $item_id . '_fields', function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					$item['id'] = $item['name'];
					return $item;
				});
				break;
				
			case 'datasets':	
				$this->useCache('content.datasets')->filterEqual('i.ctype_id', $item_id)->selectOnly('i.id, i.title, i.name, t.item_id as translated')->joinLeft('multilang_datasets', 't', 't.item_id = i.name and t.parent="'.$item_id.'" and t.lang = "'.$lang.'"');
				return $this->get('content_datasets', function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					$item['id'] = $item['name'];
					return $item;
				});
				break;
				
			default: return false;
		}
		
	}
	
	public function getObjectTree($object, $table, $parent_id){
		
		switch($object) {			
			case 'contents':
				$cats = $this->getSubCategoriesTree($table, $parent_id ? $parent_id : 1);
				if ($cats){
					foreach($cats as $cat){
						$tree_nodes[] = array(
							'title' => $cat['title'],
							'key' => "{$table}.{$cat['id']}",
							'isLazy' => ($cat['ns_right']-$cat['ns_left'] > 1),
							'isFolder' => true
						);
					}
				}
				return isset($tree_nodes) ? $tree_nodes : array();
				break;
				
			case 'menu':
				$this->select('COUNT(childs.id)', 'childs_count')->joinLeft('menu_items', 'childs', 'childs.parent_id = i.id');
				$this->filterEqual('menu_id', $table)->filterEqual('parent_id', $parent_id);
				$this->useCache('menu.items')->groupBy('id')->orderBy('ordering', 'asc');
				$menus = $this->get('menu_items');
				if($menus){
					foreach($menus as $menu){
						$tree_nodes[] = array(
							'title' => $menu['title'],
							'key' => "{$table}.{$menu['id']}",
							'isLazy' => ($menu['childs_count'] > 0)
						);
					}
				}
				return isset($tree_nodes) ? $tree_nodes : array();
				break;
				
			default: return false;
		}
		
	}
	
	public function getOriginalItem($table_name, $parent, $id){
		
		switch($table_name){
			
			case 'contents':
				return $this->useCache("content.list.{$parent}")->getItemById($this->table_prefix . $parent, $id);
				break;
				
			case 'cats':
				return $this->useCache('content.categories')->getItemById($this->table_prefix . $parent . '_cats', $id);
				break;
				
			case 'menu':
				return $this->useCache('menu.items')->getItemById('menu_items', $id);
				break;
				
			case 'widgets':
				return $this->useCache('widgets.bind')->getItemById('widgets_bind', $id);
				break;
				
			case 'ctypes':
				return $this->useCache('content.types')->getItemById('content_types', $id);
				break;
				
			case 'fields':
				return $this->useCache('content.fields.' . $parent)->getItemByField($this->table_prefix . $parent . '_fields', 'name', $id);
				break;
				
			case 'datasets':
				return $this->useCache('content.datasets')->filterEqual('i.ctype_id', $parent)->getItemByField('content_datasets', 'name', $id);
				break;
				
		}
		
        return false;
		
    }
	
	public function getReadyItem($type, $parent, $item_id){

		$table = $this->getTable($type, $parent);

		if ($parent && $type != 'contents') { $this->filterEqual('parent', $parent); }

		$this->useCache("multilang.{$table}");

        return $this->filterEqual('item_id', $item_id)->getItem($table);

    }
	
	public function addTranslate($data, $type, $parent){
		
		$table = $this->getTable($type, $parent);
		
		cmsCache::getInstance()->clean("multilang.{$table}");

		return $this->insert($table, $data);

	}
	
	public function updTranslate($data, $id, $type, $parent){
		
		$table = $this->getTable($type, $parent);

		cmsCache::getInstance()->clean("multilang.{$table}");

		return $this->update($table, $id, $data);

	}
	
	public function delTranslate($type, $parent, $id){

		$table = $this->getTable($type, $parent);

		cmsCache::getInstance()->clean("multilang.{$table}");

		return $this->delete($table, $id);

	}
	
	public function getTable($type, $parent){

		$type = str_replace("multilang_", "", $type);
		$table = ($type == 'contents') ? 'multilang_con_' . $parent : 'multilang_' . $type;

		 return $table;

	}
	
	public function createConTable($id = false, $is_field = false){

		if (!$id) {return false; }
		
		if ( $is_field ) {
			$ctype = $this->selectOnly('i.id, i.name')->getItemByField('content_types', 'name', $id);
		} else {
			$ctype = $this->selectOnly('i.id, i.name')->getItemById('content_types', $id);
		}
		if (!$ctype) { return false; }

		$fields = $this->selectOnly('i.id, i.name, i.type')->
			filterNotEqual('name', 'title')->
			filterNotEqual('name', 'content')->
			filterIn('type', $this->supports)->
			filterEqual('i.ctype_id', $ctype['id'])->get('con_' . $ctype['name'] . '_fields');

		$sql = "CREATE TABLE IF NOT EXISTS `{#}multilang_con_{$ctype['name']}` (`id` int(11) NOT NULL AUTO_INCREMENT, `item_id` int(11) NOT NULL, `lang` varchar(6) NOT NULL, `title` varchar(100) NOT NULL, `content` text, `seo_keys` text, `seo_desc` text, `seo_title` varchar(255) DEFAULT NULL, ";

		if($fields){
			$types = array(
				'caption' => 'varchar(255) NULL DEFAULT NULL',
				'string' => 'varchar(255) NULL DEFAULT NULL',
				'html' => 'text',
				'text' => 'text',
			);
			foreach($fields as $field){
				$type = isset($types[$field['type']]) ? $types[$field['type']] : 'text';
				$sql .= "`{$field['name']}` {$type}, ";
			}
		}

		$sql .= "PRIMARY KEY (`id`), KEY `item_id` (`item_id`,`lang`), KEY `parent` (`lang`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

		$is_create = $this->db->query($sql, false, true);
		
		return $is_create ? true : false;

	}
	
	public function deleteController($id){
		
		$widget = $this->getItemByField('widgets', 'controller', 'multilang');
		if($widget){
			$this->delete('widgets_bind', $widget['id'], 'widget_id');
			$this->delete('widgets', $widget['id']);
		}

		$this->db->dropTable('multilang_ctypes');
		$this->db->dropTable('multilang_menu');
		$this->db->dropTable('multilang_widgets');
		$this->db->dropTable('multilang_fields');
		$this->db->dropTable('multilang_datasets');
		
		$ctypes = $this->selectOnly('i.id, i.name')->get('content_types');
		if($ctypes){
			foreach($ctypes as $key => $ctype){
				if ($this->db->query("SELECT id FROM {#}multilang_con_" . $ctype['name'], false, true)){
					$this->db->dropTable('multilang_con_' . $ctype['name']);
				}
			}
		}
		
		return parent::deleteController($id);
	 
	}
    
}
