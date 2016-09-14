<?php

class onMultilangContentAfterDelete extends cmsAction {

	public function run($data) {
		$table_name = $this->model->ml_con_table_prefix . $data['ctype_name'];
		$this->model->delete($table_name, $data['item']['id'], 'item_id');
	}

}
