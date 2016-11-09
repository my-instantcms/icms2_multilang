<?php  

class onMultilangContentBeforeItem extends cmsAction { 

    public function run($data){	
	
		list($ctype, $item, $fields) = $data;

		$user_lang = cmsCore::getLanguageName();
		
		if ($user_lang !== $this->cms_config->language) {
			
			$this->model->filterEqual('item_id', $item['id'])->filterEqual('lang', $user_lang);
			$is_translate = $this->model->getItem('multilang_con_' . $ctype['name']);
			
			if ($is_translate) {
				unset($is_translate['id']);
				if (!empty($is_translate['seo_title'])){ $this->cms_template->setPageTitle($is_translate['seo_title']); }
				if (!empty($is_translate['seo_keys'])){ $this->cms_template->setPageKeywords($is_translate['seo_keys']); }
				if (!empty($is_translate['seo_desc'])){ $this->cms_template->setPageDescription($is_translate['seo_desc']); }
				$item = array_merge($item, $is_translate);
				$fields['content']['html'] = $is_translate['content'];
			}

			$this->model->selectOnly('i.id, i.title, i.labels');
			$this->model->filterEqual('item_id', $ctype['id'])->filterEqual('lang', $user_lang);

			$t_ctype = $this->model->getItem('multilang_ctypes', function($field, $model){
				$field['labels'] = cmsModel::yamlToArray($field['labels']);
				return $field;
			});

			if ($t_ctype) {
				unset($t_ctype['id']);
				$ctype = array_merge($ctype, $t_ctype);
			}

		}

        return array($ctype, $item, $fields);

    }

}
