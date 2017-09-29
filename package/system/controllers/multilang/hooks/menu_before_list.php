<?php  

class onMultilangMenuBeforeList extends cmsAction { 

    public function run($menu){

		$user_lang = cmsCore::getLanguageName();
		
		if ($user_lang !== $this->cms_config->language) {

			$is_translate = $this->model->
				useCache("multilang.multilang_menu")->
				selectOnly('i.id, i.item_id, i.title')->
				filterEqual('lang', $user_lang)->
				get('multilang_menu', function($item, $model){
					$item['id'] = $item['item_id'];
					unset($item['item_id']);
					return $item;
				}, 'item_id');

			if ($is_translate) {
				foreach($is_translate as $t){
					$menu[$t['id']] = array_merge($menu[$t['id']], $t);
				}
			}

		}

        return $menu;

    }

}
