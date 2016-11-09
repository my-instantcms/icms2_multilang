<?php  

class onMultilangWidgetsBeforeList extends cmsAction { 

    public function run($widgets){

		$user_lang = cmsCore::getLanguageName();

		if ($user_lang !== $this->cms_config->language) {

			$this->model->filterEqual('lang', $user_lang)->selectOnly('i.id, i.item_id, i.title, i.links');
			$is_translate = $this->model->get('multilang_widgets', function($item, $model){
				$item['id'] = $item['item_id'];
				unset($item['item_id']);
				return $item;
			}, 'item_id');

			if($is_translate){

				foreach($is_translate as $t){
					if(isset($widgets[$t['id']])){$widgets[$t['id']] = array_merge($widgets[$t['id']], $t);}				
				}

			}

		}

        return $widgets;

    }

}
