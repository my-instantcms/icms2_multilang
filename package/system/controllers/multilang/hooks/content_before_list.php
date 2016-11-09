<?php

class onMultilangContentBeforeList extends cmsAction {

    public function run($data){

        list($ctype, $item) = $data;

        if(!$item){return $data;}

		$user_lang = cmsCore::getLanguageName();

		if($user_lang !== $this->cms_config->language){

			$this->model->filterEqual('lang', $user_lang);
			$is_translate = $this->model->get('multilang_con_' . $ctype['name']);

			if($is_translate){

				foreach($is_translate as $translate){
					
					if (isset($item[$translate['item_id']])) {
						$item[$translate['item_id']] = array_merge($item[$translate['item_id']], $translate);
					}
					
				}

			}
		}

        $data = array($ctype, $item);

        return $data;

    }

}