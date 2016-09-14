<?php

class actionMultilangContentsAjax extends cmsAction {

    public function run($ctype_id, $parent_id){
        if(!$this->request->isAjax()){cmsCore::error404();}
		$lang = $this->getLang();
        $model = cmsCore::getModel('multilang');
        $ctype = $model->getItemByField('content_types', 'id', $ctype_id);
        if(!$ctype){$this->halt();}
        $category = $model->getCategory($ctype['name'], $parent_id);
        if(!$category){$this->halt();}
        $grid = $this->loadDataGrid('content_items', $ctype['name']);
        $filter = array();
        $filter_str = $this->request->get('filter');
        if($filter_str){
            parse_str($filter_str, $filter);
            $model->applyGridFilter($grid, $filter);
            $grid['filter'] = $filter;
        }
        $model->filterCategory($ctype['name'], $category, $ctype['is_cats_recursive']);
        $total = $model->getCount('con_'.$ctype['name']);
        $perpage = isset($filter['perpage']) ? $filter['perpage'] : admin::perpage;
        $pages = ceil($total / $perpage);
        $model->setPerPage($perpage);
        $items = $model->getContentItems($ctype['name'], $lang);
        $this->cms_template->renderGridRowsJSON($grid, $items, $total, $pages);
        $this->halt();

    }

}