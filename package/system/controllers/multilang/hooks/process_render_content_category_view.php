<?php

class onMultilangProcessRenderContentCategoryView extends cmsAction {

    public function run($data){

		$user_lang = cmsCore::getLanguageName();

		if ($user_lang !== $this->cms_config->language) {

			$cats = $this->model->
				useCache("multilang.multilang_cats")->
				selectOnly('i.id, i.title, i.item_id')->
				filterEqual('i.parent', $data[1]['ctype']['name'])->
				filterEqual('lang', $user_lang)->
				get('multilang_cats', false, 'item_id');

			if (!empty($data[1]['subcats'])){
				foreach ($data[1]['subcats'] as $cat_id => $cat){
					if (!empty($cats[$cat_id]['title'])){
						$data[1]['subcats'][$cat_id]['title'] = $cats[$cat_id]['title'];
					}
				}
			}
			
			if (!empty($data[1]['category']['id']) && !empty($cats[$data[1]['category']['id']]['title'])){
				$data[1]['category']['title'] = $cats[$data[1]['category']['id']]['title'];
				$this->cms_template->setPageH1($cats[$data[1]['category']['id']]['title']);
			}

			if (!empty($data[1]['category_seo']['h1_str']) && !empty($data[1]['category']['id'])){
				$data[1]['category_seo']['h1_str'] = $cats[$data[1]['category']['id']]['title'];
			}

			if (!empty($data[1]['category_seo']['title_str']) && !empty($data[1]['category']['id'])){
				$data[1]['category_seo']['title_str'] = $cats[$data[1]['category']['id']]['title'];
			}

			if (!empty($data[1]['category_seo']['meta_item']) && !empty($data[1]['category']['id'])){
				$data[1]['category_seo']['meta_item']['title'] = $cats[$data[1]['category']['id']]['title'];
			}

		}
		
		return $data;

    }

}