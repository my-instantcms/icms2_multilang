<?php  

class onMultilangCtypeFieldAfterAdd extends cmsAction { 

    public function run($data){
		$field = $data[0];
		$ctype_name = $data[1];
		
		$this->model->addContentField($ctype_name, $field);
		
    }

}
