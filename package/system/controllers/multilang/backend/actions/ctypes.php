<?php

class actionMultilangCtypes extends cmsAction {

    public function run(){

        $grid = $this->loadDataGrid('ctypes_items');
        return $this->cms_template->render('backend/ctypes', array('grid' => $grid));

    }

}
