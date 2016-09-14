<?php

class onMultilangContentBeforeCategory extends cmsAction {

	public function run($data) {

		list($c, $i) = $data;

		$user_lang = $this->cms_config->cfg_language;
		if (isset($_SESSION['language'])) {
			$user_lang = $_SESSION['language'];
		}
		if (isset($_SESSION['user']['language'])) {
			$user_lang = $_SESSION['user']['language'];
		}

		if ($user_lang !== $this->cms_config->cfg_language) {
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
		}

		$data = array($c, $i);

		return $data;
	}

}
