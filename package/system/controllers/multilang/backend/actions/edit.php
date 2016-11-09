<?php

class actionMultilangEdit extends cmsAction {

    public function run($type = false, $parent = false, $id = false){
		
        if (!$id || !$type) { cmsCore::error404(); }
		
        $lang = $this->getLang();

		$translate = $this->model->filterEqual('lang', $lang)->getReadyItem($type, $parent, $id);
		if (!$translate) { cmsCore::error404(); }
		
        $form = $this->getForm($type, array($parent));

        $is_submitted = $this->request->has('submit');
        if ($is_submitted) {
			
			$id = $translate['id'];

            $translate = $form->parse($this->request, $is_submitted);
            $errors = $form->validate($this, $translate);
			
            if (!$errors) {

                $translate_id = $this->model->updTranslate($translate, $id, $type, $parent);
                if($translate_id){
                    cmsUser::addSessionMessage(LANG_MULTILANG_UPDATE, 'success');
                }

                if($type == 'menu'){ $this->redirectToAction('objects', array('menu', 'lazy')); }
				if($type == 'widgets'){ $this->redirectToAction('objects', array('widgets', '0', 'template')); }
				
                $this->redirectToAction('objects', $type);

            } else {
                cmsUser::addSessionMessage(LANG_FORM_ERRORS, 'error');
            }
        }

        return $this->cms_template->render('backend/add', array(
            'do' => 'edit',
            'form' => $form,
            'original' => isset($translate) ? $translate : false,
			'options' => isset($this->options) ? $this->options : false,
            'errors' => isset($errors) ? $errors : false,
			'lang' => $lang,
			'type' => $type,
			'parent' => $parent ? $parent : 'none',
			'id' => $id ? $id : 'none'
        ));
    }
}