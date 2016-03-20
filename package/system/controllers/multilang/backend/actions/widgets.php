<?php

class actionMultilangWidgets extends cmsAction {

    public function run() {	
        $model = cmsCore::getModel('multilang');
        $widgets = $model->selectOnly('i.id, i.title')->get('widgets');
        $grid = $this->loadDataGrid('widget_items');
        return cmsTemplate::getInstance()->render('backend/widgets', array('widgets' => $widgets, 'grid' => $grid));
    }

}