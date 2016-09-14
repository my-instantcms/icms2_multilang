<?php  

class onMultilangCtypeFieldAfterUpdate extends cmsAction { 
	
    public function run($data){
		$field = $data[0];
		$field_old = $data[1];
		$ctype_name = $data[2];
		$content_model = $data[3];
		
		$this->model->updateContentField($field, $field_old, $ctype_name, $content_model);
		
    }

}
