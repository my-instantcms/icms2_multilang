<?php

class actionMultilangObjectsTree extends cmsAction {

    public function run($object = false){

		if(!$object || !$this->request->isAjax()) {cmsCore::error404();}

        $id = $this->request->get('id', '');
        if(!$id){ cmsCore::error404(); }

        list($table, $parent_id) = explode('.', $id);

        $items = $this->model->getObjectTree($object, $table, $parent_id);

        $this->cms_template->renderJSON($items);

    }

}
