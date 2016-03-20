<?php

class actionMultilangDelete extends cmsAction {

    public function run($type=false, $parent=false, $id=false){
        if (!$parent || !$id) { cmsCore::error404(); }	
        $model = cmsCore::getModel('multilang');
		$lang = $this->getLang();
		$translate = $model->filterEqual('lang', $lang)->getReadyItem('multilang_'.$type, $parent, $id);
		if(!$translate){cmsCore::error404();}
        $translate_id = $model->delete('multilang_'.$type, $translate['id']);
		if ($translate_id) {
			cmsUser::addSessionMessage(LANG_MULTILANG_DELETE, 'success');
		}
		$this->redirectToAction($type);
    }
}