<?php

class onMultilangContentItemForm extends cmsAction {

    public function run($data){

        list($form, $item, $ctype) = $data;

        if(!$item || empty($item['ctype_name'])){
			$item['ctype_name'] = $this->cms_core->request->get('ctype_name', '');
		}

		$user_lang = cmsCore::getLanguageName();

		if($user_lang !== $this->cms_config->language){

			$is_translate = $this->model->
				useCache("multilang.multilang_fields")->
				filterEqual('i.lang', $user_lang)->
				filterEqual('i.parent', $item['ctype_name'])->
				get('multilang_fields', false, 'item_id');

			if($is_translate){

				foreach($form->getStructure() as $fieldset){
					foreach( $fieldset['childs'] as $field) {
						if (!empty($is_translate[$field->getName()])){
							$field->element_title = $is_translate[$field->getName()]['title'];
							$field->hint = $is_translate[$field->getName()]['hint'];
						}
					}
				}

			}
		}

        return array($form, $item, $ctype);

    }

}