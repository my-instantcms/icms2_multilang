<?php

class onMultilangContentDatasets extends cmsAction {

    public function run($data){

        list($datasets, $ctype) = $data;
		
		$user_lang = cmsCore::getLanguageName();
		
		if ($user_lang !== $this->cms_config->language) {
		
			$translates = $this->model->
				useCache("multilang.multilang_datasets")->
				filterEqual('i.parent', $ctype['id'])->
				filterEqual('i.lang', $user_lang)->
				get('multilang_datasets', false, 'item_id');

			if ($datasets){
				foreach ($datasets as $key => $dataset){
					if (isset($translates[$key])){
						$datasets[$key]['title'] = $translates[$key]['title'];
						$datasets[$key]['description'] = $translates[$key]['description'];
						$datasets[$key]['seo_title'] = $translates[$key]['seo_title'];
						$datasets[$key]['seo_keys'] = $translates[$key]['seo_keys'];
						$datasets[$key]['seo_desc'] = $translates[$key]['seo_desc'];
					}
				}
			}

		}

        return array($datasets, $ctype);

    }

}
