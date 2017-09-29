<?php

class actionMultilangObjectsAjax extends cmsAction {

    public function run($object = false, $item_id = false, $parent_id = false, $grid_field = false){
		
        if(!$object || !$this->request->isAjax()){cmsCore::error404();}
		
		$lang = $this->getLang();
		
        $grid = $this->loadDataGrid('objects', $grid_field);
		
        $filter = array();
        $filter_str = $this->request->get('filter', '');
        if($filter_str){
            parse_str($filter_str, $filter);
            $this->model->applyGridFilter($grid, $filter);
            $grid['filter'] = $filter;
        }
		
		$perpage = isset($filter['perpage']) ? $filter['perpage'] : admin::perpage;
        $total = $this->model->getItemsCount($object, $item_id, $parent_id);
        $pages = ceil($total / $perpage);		
        $this->model->setPerPage($perpage);
		
        $items = $this->model->getItems($object, $item_id, $parent_id, $lang);
        $this->cms_template->renderGridRowsJSON($grid, $items, $total, $pages);
        $this->halt();

    }

}