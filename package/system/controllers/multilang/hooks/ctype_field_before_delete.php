<?php

class onMultilangCtypeFieldBeforeDelete extends cmsAction {

	public function run($data) {
		$field = $data[0];
		$ctype_name = $data[1];

		if ($this->model->db->isFieldExists($this->model->ml_con_table_prefix . $ctype_name, $field['name'])) {
			$this->model->db->dropTableField($this->model->ml_con_table_prefix . $ctype_name, $field['name']);
		}

		$this->model->db->delete($this->model->ml_table_prefix . 'fields', 'parent = "' . $ctype_name . '" AND item_id = "' . $field['id'] . '"');
	}

}
