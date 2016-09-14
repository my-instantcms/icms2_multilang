<?php

class onMultilangMenuItemAfterDelete extends cmsAction {

	public function run($item_id) {
		$table_name = $this->model->ml_table_prefix . 'menu';
		$this->model->delete($table_name, $item_id, 'item_id');
	}

}
