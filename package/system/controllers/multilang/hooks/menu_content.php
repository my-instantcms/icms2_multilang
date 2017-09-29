<?php

class onMultilangMenuContent extends cmsAction {

    public function run($item){
		
		$user_lang = cmsCore::getLanguageName();

        if ($item['url'] == '#'){			
			
			if($user_lang !== $this->cms_config->language){

				$labels = $this->model->
					useCache("multilang.multilang_ctypes")->
					selectOnly('i.id, i.labels, i.item_id')->
					filterEqual('lang', $user_lang)->
					get('multilang_ctypes', function($item, $model){
						$item['labels'] = cmsModel::yamlToArray($item['labels']);
						return $item;
					});

				if ($labels) {

					foreach($labels as $label){

						for($i = 0; $i < count($item['items']); $i++){
							
							if($item['items'][$i]['id'] == 'content_add' . $label['item_id']){
								$item['items'][$i]['title'] = sprintf(LANG_CONTENT_ADD_ITEM, $label['labels']['create']);
								continue;
							}

						}
						
					}

				}
			}

        } else {
			if ($user_lang !== $this->cms_config->language) {

				$segments = explode('/', mb_substr($item['url'], 1));

				if (!empty($segments[0])) {
					
					$is_lang = is_dir($this->cms_config->root_path.'system/languages/'.$segments[0].'/');

					if (preg_match('/^[a-z]{2}$/i', $segments[0]) && $is_lang && isset($segments[1])){
						$ctype_name = $segments[1];
					} else {
						$ctype_name = $segments[0];
					}

					$cats = $this->model->
						useCache("multilang.multilang_cats")->
						selectOnly('i.id, i.title, i.item_id')->
						filterEqual('i.parent', $ctype_name)->
						filterEqual('lang', $user_lang)->
						get('multilang_cats');

					if($cats){

						foreach($cats as $cat){

							for($i = 0;$i < count($item['items']); $i++){

								if($item['items'][$i]['id'] == 'content.' . $ctype_name . '.' .$cat['item_id']){
									$item['items'][$i]['title'] = $cat['title'];
									continue;
								}

							}
							
						}

					}

				}

			}
			
        }
		
		return $item;

    }

}