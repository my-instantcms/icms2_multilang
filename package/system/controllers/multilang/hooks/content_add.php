<?php

class onMultilangContentAdd extends cmsAction {

    public function run($ctype){

		$user_lang = cmsCore::getLanguageName();

		if($user_lang !== $this->cms_config->language){
		
			$translate = $this->model->
				useCache("multilang.multilang_ctypes")->
				filterEqual('item_id', $ctype['id'])->
				filterEqual('lang', $user_lang)->
				selectOnly('i.id, i.title, i.labels')->
				getItem('multilang_ctypes', function($field, $model){
					$field['labels'] = cmsModel::yamlToArray($field['labels']);
					return $field;
				});

			if ($translate){
				unset($translate['id']);
				$ctype = array_merge($ctype, $translate);
			}

		}

        return $ctype;

    }

}