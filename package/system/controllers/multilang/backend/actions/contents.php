<?php

class actionMultilangContents extends cmsAction {

    public function run($do=false){

        // если нужно, передаем управление другому экшену
        if ($do){
            $this->runAction('contents_'.$do, array_slice($this->params, 1));
            return;
        }

        $content_model = cmsCore::getModel('content');

        $ctypes = $content_model->getContentTypes();

        $tree_path = cmsUser::getCookie('content_tree_path');
        if($tree_path && ($tree_path = explode('/', $tree_path)) && !empty($tree_path[1]) && ($ctype_id = (int)$tree_path[1])){
            $ctype = $content_model->getContentType($ctype_id);
        }

        if(!empty($ctype)){
            $grid = $this->loadDataGrid('content_items', false, 'admin.grid_filter.content.'.$ctype['name']);
        } else {
            $grid = $this->loadDataGrid('content_items');
        }

        return cmsTemplate::getInstance()->render('backend/contents', array(
            'ctypes'     => $ctypes,
            'grid'       => $grid
        ));

    }

}
