<?php

class onMultilangContentBeforeList extends cmsAction {

    public function run($data){

        list($ctype, $item) = $data;

        if(!$item){return $data;}

		$user_lang = cmsCore::getLanguageName();

		if($user_lang !== $this->cms_config->language){

			$this->model->useCache("multilang.multilang_con_{$ctype['name']}")->filterEqual('lang', $user_lang);
			$is_translate = $this->model->get('multilang_con_' . $ctype['name']);

			if($is_translate){

				$fields = $this->model->
					useCache("multilang.multilang_fields")->
					selectOnly('i.item_id, i.title')->
					filterEqual('i.lang', $user_lang)->
					filterEqual('i.parent', $ctype['name'])->
					get('multilang_fields', false, 'item_id');

				foreach($is_translate as $translate){
					
					if (isset($item[$translate['item_id']])) {
						$item[$translate['item_id']] = array_merge($item[$translate['item_id']], $translate);
						foreach($translate as $key => $value){
							if (isset($item[$translate['item_id']]['fields'][$key])){
								$item[$translate['item_id']]['fields'][$key]['html'] = $value;
							}
							if (isset($fields[$key]) && isset($item[$translate['item_id']]['fields'][$key])){
								$item[$translate['item_id']]['fields'][$key]['title'] = $fields[$key]['title'];
							}
						}
					}
					
				}

			}
		}

        return array($ctype, $item);

    }

}