<?php

class actionMultilangWidgetsAjax extends cmsAction {

    public function run($id=false){
        if(!$id || !$this->request->isAjax()){cmsCore::error404();}		
		$model = cmsCore::getModel('multilang');		
        $grid = $this->loadDataGrid('widget_items');
		$lang = $this->getLang();
		$widgets = $model->getWidgetItems($id, $lang);
        $this->cms_template->renderGridRowsJSON($grid, $widgets);
        $this->halt();
    }

}
