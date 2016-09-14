<?php  

class onMultilangCtypeAfterDelete extends cmsAction { 

    public function run($ctype){
		$this->model->db->dropTable($this->model->ml_con_table_prefix . $ctype['name']);
		$this->model->db->delete($this->model->ml_table_prefix . 'fields', 'parent = "' . $ctype['name'] . '"');
    }

}
