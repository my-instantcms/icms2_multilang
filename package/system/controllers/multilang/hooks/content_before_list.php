<?php

class onMultilangContentBeforeList extends cmsAction {

	public function run($data) {
		list($c, $i, $f) = $data;
		
		$table_name = $this->model->ml_con_table_prefix . $c['name'];

		if (!$i) {
			return $data;
		}

		$user_lang = $this->cms_config->cfg_language;

		if (isset($_SESSION['language'])) {
			$user_lang = $_SESSION['language'];
		}
		if (isset($_SESSION['user']['language'])) {
			$user_lang = $_SESSION['user']['language'];
		}

		if ($user_lang !== $this->cms_config->cfg_language) {
			$this->model->filterIn('item_id', array_keys($i))->filterEqual('lang', $user_lang);
			$is_translate = $this->model->get($table_name);
			if ($is_translate) {
				foreach ($is_translate as $t) {
					if (isset($i[$t['item_id']])) {
						$i[$t['item_id']] = array_merge($i[$t['item_id']], $t);
					}
				}
			}
			
			$t_fields = $this->model->getFieldItems($c, $user_lang);
			if($t_fields){
				foreach ($t_fields as $name => $t_field) {
					$f[$name]['title'] = $t_field['title'];
				}
			}
			
		}

		$data = array($c, $i, $f);

		return $data;
	}

}
