<?php  

class onMultilangWidgetsBeforeList extends cmsAction { 

    public function run($widgets){

		$user_lang = cmsCore::getLanguageName();

		if ($user_lang !== $this->cms_config->language) {

			$is_translate = $this->model->
				useCache("multilang.multilang_widgets")->
				selectOnly('i.id, i.parent, i.title, i.links')->
				filterEqual('lang', $user_lang)->
				get('multilang_widgets', function($item, $model){
					$item['id'] = $item['parent'];
					unset($item['parent']);
					return $item;
				}, 'parent');

			if($is_translate){
				foreach($is_translate as $t){
					if(isset($widgets[$t['id']])){$widgets[$t['id']] = array_merge($widgets[$t['id']], $t);}				
				}
			}

		}

        return $widgets;

    }

}
