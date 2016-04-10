<?php

class actionMultilangMenu extends cmsAction {

    public function run($do=false){

        if ($do){
            $this->runAction('menu_'.$do, array_slice($this->params, 1));
            return;
        }

        $menu_model = cmsCore::getModel('menu');

        $menus = $menu_model->getMenus();

        $grid = $this->loadDataGrid('menu_items');

        return $this->cms_template->render('backend/menu', array(
            'menus' => $menus,
            'grid' => $grid
        ));

    }

}
