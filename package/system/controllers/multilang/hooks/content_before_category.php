<?php

class onMultilangContentBeforeCategory extends cmsAction {

    public function run($data){

        list($ctype, $item) = $data;
		
		$user_lang = cmsCore::getLanguageName();
		
		if ($user_lang !== $this->cms_config->language) {
	
			$translate = $this->model->
				useCache("multilang.multilang_ctypes")->
				filterEqual('item_id', $ctype['id'])->
				filterEqual('lang', $user_lang)->
				getItem('multilang_ctypes', function($field, $model){
					$field['labels'] = cmsModel::yamlToArray($field['labels']);
					return $field;
				});
			
			if ($translate){
				unset($translate['id']);
				if (!empty($translate['seo_title'])){ $this->cms_template->setPageTitle($translate['seo_title']); }
				if (!empty($translate['seo_keys'])){ $this->cms_template->setPageKeywords($translate['seo_keys']); }
				if (!empty($translate['seo_desc'])){ $this->cms_template->setPageDescription($translate['seo_desc']); }
				$ctype = array_merge($ctype, $translate);
			}

		}

        return array($ctype, $item);

    }

}
