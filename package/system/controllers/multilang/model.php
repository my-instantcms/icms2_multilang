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
				return $this->selectOnly('i.id, i.title')->get('menu');
				break;
				
			case 'widgets':
				return $this->selectOnly('i.id, i.title')->get('widgets');
				break;
				
			default: return false;
		}
		
	}
	
	public function getItemsCount($object, $item_id, $parent_id){
		
		switch($object) {			
			case 'contents':
				$category = $this->getCategory($item_id, $parent_id ? $parent_id : 1);
				if(!$category){return false;}
				$this->filterCategory($item_id, $category, true);
				return $this->getCount($this->table_prefix  . $item_id);
				break;
				
			case 'cats':
				$category = $this->getCategory($item_id, $parent_id ? $parent_id : 1);
				if(!$category){return false;}
				$this->filterCategory($item_id, $category, true);
				return $this->getCount($this->table_prefix  . $item_id . '_cats');
				break;
				
			case 'menu':
				$this->filterEqual('menu_id', $item_id)->filterEqual('parent_id', $parent_id);
				return $this->getCount('menu_items');
				break;
				
			case 'widgets':
				return $this->filterEqual('widget_id', $item_id)->getCount('widgets_bind');
				break;
				
			case 'ctypes':
				return $this->getCount('content_types');
				
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

				$this->selectOnly('i.id, i.title, t.item_id as translated');
				$this->joinLeft('multilang_con_' . $item_id, 't', 't.item_id = i.id and t.lang = "'.$lang.'"');
				return $this->get($this->table_prefix . $item_id, function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					return $item;
				});
				break;
			
			case 'cats':
				$this->selectOnly('i.id, i.title, t.item_id as translated')->filterGt('i.parent_id', 0);
				$this->joinLeft('multilang_cats', 't', 't.item_id=i.id and t.parent="'.$item_id.'" and t.lang="'.$lang.'"');
				return $this->get($this->table_prefix . $item_id . '_cats', function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					return $item;
				});
				break;
				
			case 'menu':
				$this->selectOnly('i.id, i.title, t.item_id as translated');
				$this->joinLeft('multilang_menu', 't', 't.item_id=i.id and t.parent='.$item_id.' and t.lang="'.$lang.'"');
				if($item_id !== false){$this->filterEqual('menu_id', $item_id);}
				if ($parent_id !== false){$this->filterEqual('parent_id', $parent_id);}
				return $this->orderBy('ordering', 'asc')->get('menu_items', function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					return $item;
				});
				break;
				
			case 'widgets':
				$this->selectOnly('i.id, i.title, i.template, t.item_id as translated');
				$this->joinLeft('multilang_widgets', 't', 't.item_id=i.id and t.parent='.$item_id.' and t.lang="'.$lang.'"');
				return $this->filterEqual('widget_id', $item_id)->get('widgets_bind', function($item, $model) use ($item_id){
					$item['parent'] = $item_id;
					return $item;
				});
				break;
			case 'ctypes':	
				$this->selectOnly('i.id, i.title, t.item_id as translated');
				$this->joinLeft('multilang_ctypes', 't', 't.item_id = i.id and t.lang = "'.$lang.'"');
				return $this->get('content_types', function($item, $model){
					$item['parent'] = 0;
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
				$this->groupBy('id')->orderBy('ordering', 'asc');
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
				$table_name = $this->table_prefix . $parent;
				break;
				
			case 'cats':
				$table_name = $this->table_prefix . $parent . '_cats';
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
	
	public function getReadyItem($type, $parent, $item_id){
		
		$table = $this->getTable($type, $parent);
		
		if ($parent && $type != 'contents') { $this->filterEqual('parent', $parent); }	
		
        return $this->filterEqual('item_id', $item_id)->getItem($table);
		
    }
	
	public function addTranslate($data, $type, $parent){
		
		$table = $this->getTable($type, $parent);

		return $this->insert($table, $data);

	}
	
	public function updTranslate($data, $id, $type, $parent){
		
		$table = $this->getTable($type, $parent);

		return $this->update($table, $id, $data);

	}
	
	public function getTable($type, $parent){

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
		
		$ctypes = $this->selectOnly('i.id, i.name')->get('content_types');
		if($ctypes){
			foreach($ctypes as $id => $ctype_name){	
				$this->db->dropTable('multilang_con_' . $ctype_name);
			}
		}
		
		return parent::deleteController($id);
	 
	}
    
}