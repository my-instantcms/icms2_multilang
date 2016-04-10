<?php

class actionMultilangMenuAjax extends cmsAction {

    public function run($menu_id, $parent_id){
        if (!$this->request->isAjax()) { cmsCore::error404(); }
		$lang = $this->getLang();
        $model = cmsCore::getModel('multilang');
		
        $grid = $this->loadDataGrid('menu_items');

        $items = $model->getMenuItems($menu_id, $parent_id, $lang);

        $total = $items ? 1 : 0;

        $this->cms_template->renderGridRowsJSON($grid, $items, $total);

        $this->halt();

    }

}
