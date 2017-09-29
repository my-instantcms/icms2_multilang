<?php

class actionMultilangDelete extends cmsAction {

    public function run($type = false, $parent = false, $id = false){
		
        if (!$type || !$id) { cmsCore::error404(); }
		
		$lang = $this->getLang();
		
		$translate = $this->model->filterEqual('lang', $lang)->getReadyItem($type, $parent, $id);		
		if(!$translate){cmsCore::error404();}

        $translate_id = $this->model->delTranslate($type, $parent, $translate['id']);
		if ($translate_id) {
			cmsUser::addSessionMessage(LANG_MULTILANG_DELETE, 'success');
		}
		
		if($type == 'menu'){ $this->redirectToAction('objects', array('menu', 'lazy')); }
		if($type == 'widgets'){ $this->redirectToAction('objects', array('widgets', '0', 'template')); }
		
		$this->redirectToAction('objects', $type);
		
    }
	
}