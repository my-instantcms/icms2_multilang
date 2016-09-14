<?php

class onMultilangWidgetsBeforeList extends cmsAction {

	public function run($widgets) {
		$user_lang = $this->cms_config->cfg_language;
		if (isset($_SESSION['language'])) {
			$user_lang = $_SESSION['language'];
		}
		if (isset($_SESSION['user']['language'])) {
			$user_lang = $_SESSION['user']['language'];
		}
		if ($user_lang !== $this->cms_config->cfg_language) {
			$this->model->selectOnly('i.id, i.item_id, i.title, i.links');
			$this->model->filterEqual('lang', $user_lang);
			$is_translate = $this->model->get($this->model->ml_table_prefix . 'widgets', function($item, $model) {
				$item['id'] = $item['item_id'];
				unset($item['item_id']);
				return $item;
			}, 'item_id');
			if ($is_translate) {
				foreach ($is_translate as $t) {
					if (isset($widgets[$t['id']])) {
						$widgets[$t['id']] = array_merge($widgets[$t['id']], $t);
					}
				}
			}
		}
		return $widgets;
	}

}
