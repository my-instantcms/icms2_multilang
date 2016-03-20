<?php  

class onMultilangMenuTranslate extends cmsAction { 

    public function run($menu){
		$user_lang = 'ru';
		if(isset($_SESSION['language'])){
			$user_lang = $_SESSION['language'];
		}
		if(isset($_SESSION['user']['language'])){
			$user_lang = $_SESSION['user']['language'];
		}
		if($user_lang !== $this->cms_config->cfg_language){
			$this->model->selectOnly('i.id, i.item_id, i.title');
			$this->model->filterEqual('lang', $user_lang);
			$is_translate = $this->model->get('multilang_menu', function($item, $model){
				$item['id'] = $item['item_id'];
				unset($item['item_id']);
				return $item;
			}, 'item_id');
			if($is_translate){
				foreach($is_translate as $t){
					$menu[$t['id']] = array_merge($menu[$t['id']], $t);
				}
			}
		}
        return $menu;
    }

}
