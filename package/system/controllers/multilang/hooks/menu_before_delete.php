<?php

class onMultilangMenuBeforeDelete extends cmsAction {

	public function run($id) {
		$table_name = $this->model->ml_table_prefix . 'menu';
		$this->model->delete($table_name, $id, 'parent');
	}

}
