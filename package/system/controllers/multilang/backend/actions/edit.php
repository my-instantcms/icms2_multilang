<?php

class actionMultilangEdit extends cmsAction {

    public function run($type=false, $parent=false, $id=false){
        if (!$parent || !$id || !$type) { cmsCore::error404(); }	
        $model = cmsCore::getModel('multilang');
		$options = cmsController::getOptions();
		$lang = $this->getLang();
		$translate = $model->filterEqual('lang', $lang)->getReadyItem('multilang_'.$type, $parent, $id);
		if(!$translate){cmsCore::error404();}
        $form = $this->getForm($type);
        $is_submitted = $this->request->has('submit');
        if ($is_submitted){
			$id = $translate['id'];
            $translate = $form->parse($this->request, $is_submitted);
            $errors = $form->validate($this, $translate);
            if (!$errors) {
                $translate_id = $model->updTranslate($translate, $id, 'multilang_'.$type);
                if ($translate_id) {
                    cmsUser::addSessionMessage(LANG_MULTILANG_UPDATE, 'success');
                }
                $this->redirectToAction($type);
            } else {
                cmsUser::addSessionMessage(LANG_FORM_ERRORS, 'error');
            }
        }

        return cmsTemplate::getInstance()->render('backend/add', array(
            'do' => 'edit',
            'form' => $form,
            'original' => isset($translate) ? $translate : false,
			'options' => isset($options) ? $options : false,
            'errors' => isset($errors) ? $errors : false,
			'lang' => $lang
        ));
    }
}