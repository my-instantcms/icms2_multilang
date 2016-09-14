<?php

class actionMultilangCtypesAjax extends cmsAction {

    public function run(){
        if(!$this->request->isAjax()){cmsCore::error404();}
		$model = cmsCore::getModel('multilang');		
        $grid = $this->loadDataGrid('ctypes_items');
		$lang = $this->getLang();
		$ctypes = $model->getCtypes($lang);
        $this->cms_template->renderGridRowsJSON($grid, $ctypes);
        $this->halt();
    }

}
