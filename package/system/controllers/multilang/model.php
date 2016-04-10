<?php

class modelMultilang extends cmsModel {
	
	public $table_prefix = 'con_';
	
	public function getContentItems($ctype, $lang){
        $table_name = $this->table_prefix . $ctype;
        $this->selectOnly('i.id, i.title, t.item_id as translated');
        $this->joinLeft('multilang_contents', 't', 't.item_id = i.id and t.parent = "'.$ctype.'" and t.lang = "'.$lang.'"');
        return $this->get($table_name, function($item, $model) use ($ctype){
			$item['parent'] = $ctype;
			return $item;
		});
    }
	
	public function getMenuItems($menu_id=false, $parent_id=false, $lang){
        $this->selectOnly('i.id, i.title, t.item_id as translated');
        $this->joinLeft('multilang_menu', 't', 't.item_id = i.id and t.parent = '.$menu_id.' and t.lang = "'.$lang.'"');
        if($menu_id !== false){$this->filterEqual('menu_id', $menu_id);}
        if ($parent_id !== false){$this->filterEqual('parent_id', $parent_id);}
        return $this->get('menu_items', function($item, $model) use ($menu_id){
            $item['parent'] = $menu_id;
            return $item;
        });
    }
	
	public function getWidgetItems($id, $lang){
		$this->selectOnly('i.id, i.title, i.template, t.item_id as translated');
        $this->joinLeft('multilang_widgets', 't', 't.item_id = i.id and t.parent = '.$id.' and t.lang = "'.$lang.'"');
        return $this->filterEqual('widget_id', $id)->get('widgets_bind', function($item, $model) use ($id){
            $item['parent'] = $id;
            return $item;
        });
    }
	
	public function getCtypes($lang){
		$this->selectOnly('i.id, i.title, t.item_id as translated');
        $this->joinLeft('multilang_ctypes', 't', 't.item_id = i.id and t.lang = "'.$lang.'"');
        return $this->get('content_types');
    }
	
	public function getOriginalItem($table_name, $parent, $id){
		switch($table_name){
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
	
	public function getReadyItem($table, $parent, $item_id){
		if($parent){$this->filterEqual('parent', $parent);}
        return $this->filterEqual('item_id', $item_id)->getItem($table);
    }
	
	public function addTranslate($data, $table){
		 return $this->insert($table, $data);
	}
	
	public function updTranslate($data, $id, $table){
		 return $this->update($table, $id, $data);
	}
	
	public function deleteController($id) {
		
		$widget = $this->getItemByField('widgets', 'controller', 'multilang');
		if($widget){
			$this->delete('widgets_bind', $widget['id'], 'widget_id');
			$this->delete('widgets', $widget['id']);
		}
		$this->db->dropTable('multilang_contents');
		$this->db->dropTable('multilang_ctypes');
		$this->db->dropTable('multilang_menu');
		$this->db->dropTable('multilang_widgets');
		return parent::deleteController($id);
	 
	}
    
}