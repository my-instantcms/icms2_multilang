<?php

class onMultilangContentBeforeItem extends cmsAction {

	public function run($data) {
		list($c, $i, $f) = $data;
		
		$url_lang = $this->getUrlLang();
		$user_lang = $url_lang ? $url_lang : $this->cms_config->cfg_language;

		if (isset($_SESSION['language'])) {
			$user_lang = $_SESSION['language'];
		}
		if (isset($_SESSION['user']['language'])) {
			$user_lang = $_SESSION['user']['language'];
		}
		if ($user_lang !== $this->cms_config->cfg_language) {

			$tool_btn_title = LANG_MULTILANG_ADD_TRANSLATE;
			$tool_btn_url = 'add';

			$this->model->filterEqual('item_id', $i['id'])->filterEqual('lang', $user_lang);
			$is_translate = $this->model->getItem($this->model->ml_con_table_prefix . $c['name']);

			if ($is_translate) {
				$tool_btn_title = LANG_MULTILANG_EDIT_TRANSLATE;
				$tool_btn_url = 'edit';

				unset($is_translate['id']);
				unset($is_translate['user_id']);

				$i = array_merge($i, $is_translate);
				
				foreach ($is_translate as $key=>$translate){
					if(!empty($f[$key]['html'])){
						$f[$key]['html'] = $translate;
					}
				}
				
			}
			
			$this->model->selectOnly('i.id, i.title, i.labels');
			$this->model->filterEqual('item_id', $c['id'])->filterEqual('lang', $user_lang);
			$t_ctype = $this->model->getItem($this->model->ml_table_prefix . 'ctypes', function($item, $model) {
				$item['labels'] = cmsModel::yamlToArray($item['labels']);
				return $item;
			});
			
			if ($t_ctype) {
				unset($t_ctype['id']);
				$c = array_merge($c, $t_ctype);
			}

			$t_fields = $this->model->getFieldItems($c, $user_lang);
			
			if($t_fields){
				foreach ($t_fields as $name => $t_field) {
					$f[$name]['title'] = $t_field['title'];
				}
			}
			
			if ($this->cms_user->is_admin) {
				$this->cms_template->addToolButton(array(
					'class' => 'blog',
					'title' => $tool_btn_title,
					'href' => href_to("admin", "controllers/edit/multilang/{$tool_btn_url}/contents", array($c['name'], $i['id'])),
				));
			}
		}


		return array($c, $i, $f);
	}

}
