<?php

class actionMultilangAdd extends cmsAction {

    public function run($type=false, $parent=false, $id=false){
        if (!$id || !$type) { cmsCore::error404(); }	
        $model = cmsCore::getModel('multilang');
        $options = cmsController::getOptions();
		$lang = $this->getLang();
		$original = $model->getOriginalItem($type, $parent, $id);
		if(!$original){cmsCore::error404();}
        $form = $this->getForm($type);
        $is_submitted = $this->request->has('submit');
        if($is_submitted){
            $translate = $form->parse($this->request, $is_submitted);
			$translate['item_id'] = $original['id'];
			if($parent){$translate['parent'] = $parent;}
			$translate['lang'] = $lang;
            $errors = $form->validate($this, $translate);
            if (!$errors) {
                $translate_id = $model->addTranslate($translate, 'multilang_'.$type);
                if ($translate_id) {
                    cmsUser::addSessionMessage(LANG_MULTILANG_ADD, 'success');
                }
                $this->redirectToAction($type);
            } else {
                cmsUser::addSessionMessage(LANG_FORM_ERRORS, 'error');
            }
        }

        return $this->cms_template->render('backend/add', array(
            'do' => 'add',
            'form' => $form,
            'translate' => isset($translate) ? $translate : false,
            'original' => isset($original) ? $original : false,
            'options' => isset($options) ? $options : false,
            'errors' => isset($errors) ? $errors : false,
			'lang' => $lang,
			'type' => $type
        ));
    }
}