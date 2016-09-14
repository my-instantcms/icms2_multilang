<?php

class actionMultilangFields extends cmsAction {

	public function run() {
		$model = cmsCore::getModel('multilang');
		
		$model->selectOnly('i.id, i.title');
		$ctypes = $model->get('content_types');
		
		$grid = $this->loadDataGrid('ctype_fields');
		return $this->cms_template->render('backend/fields', array('ctypes' => $ctypes, 'grid' => $grid));
	}

}
