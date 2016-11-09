<?php

class actionMultilangObjects extends cmsAction {

    public function run($object = false, $lazy = false, $grid_field = false){
		
		if(!$object){cmsCore::error404();}
		
		$items = $this->model->getObject($object);
		
		$grid = $this->loadDataGrid('objects', $grid_field);

        return $this->cms_template->render('backend/objects', array(
            'items' => $items,
            'object' => $object,
            'lazy' => $lazy,
            'grid' => $grid,
            'grid_field' => $grid_field,
        ));

    }

}
