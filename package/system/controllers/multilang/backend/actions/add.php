<?php

class actionMultilangAdd extends cmsAction {

    public function run($type = false, $parent = false, $id = false){
		
        if (!$id || !$type) { cmsCore::error404(); }
		
		$lang = $this->getLang();
		
		$original = $this->model->getOriginalItem($type, $parent, $id);
		if (!$original){cmsCore::error404();}
		
        $form = $this->getForm($type, array($parent));

        $is_submitted = $this->request->has('submit');
        if ($is_submitted){
			
            $translate = $form->parse($this->request, $is_submitted);
			$translate['item_id'] = $id;
			
			if ($parent){ $translate['parent'] = $parent; }			
			$translate['lang'] = $lang;
			
            $errors = $form->validate($this, $translate);			
            if (!$errors) {
				
                $translate_id = $this->model->addTranslate($translate, $type, $parent);				
                if ($translate_id) {
                    cmsUser::addSessionMessage(LANG_MULTILANG_ADD, 'success');
                }
				
				if ($type == 'menu'){ $this->redirectToAction('objects', array('menu', 'lazy')); }
				if ($type == 'widgets'){ $this->redirectToAction('objects', array('widgets', '0', 'template')); }
				
                $this->redirectToAction('objects', $type);
				
            } else {
                cmsUser::addSessionMessage(LANG_FORM_ERRORS, 'error');
            }
        }

        return $this->cms_template->render('backend/add', array(
            'do' => 'add',
            'form' => $form,
            'translate' => isset($translate) ? $translate : false,
            'original' => isset($original) ? $original : false,
            'options' => isset($this->options) ? $this->options : false,
            'errors' => isset($errors) ? $errors : false,
			'lang' => $lang,
			'type' => $type,
			'parent' => $parent ? $parent : 'none',
			'id' => $id ? $id : 'none'
        ));
    }
}