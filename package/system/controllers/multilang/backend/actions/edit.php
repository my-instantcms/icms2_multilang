<?php

class actionMultilangEdit extends cmsAction {

    public function run($type=false, $parent=false, $id=false){
        if (!$id || !$type) { cmsCore::error404(); }	
        $model = cmsCore::getModel('multilang');
		$lang = $this->getLang();
		$translate = $model->filterEqual('lang', $lang)->getReadyItem('multilang_'.$type, $parent, $id);
		if(!$translate){cmsCore::error404();}
        $form = $this->getForm($type);
		if($type == 'contents'){
			$is_teaser = $model->db->isFieldExists('con_' . $parent, 'teaser');
			if($is_teaser){
				$form->addField(0, new fieldText('teaser', array(
					'title' => LANG_MULTILANG_FIELD_TEASER,
				)));
			}
		}
        $is_submitted = $this->request->has('submit');
        if($is_submitted){
			$id = $translate['id'];
            $translate = $form->parse($this->request, $is_submitted);
            $errors = $form->validate($this, $translate);
            if(!$errors){
                $translate_id = $model->updTranslate($translate, $id, 'multilang_'.$type);
                if($translate_id){
                    cmsUser::addSessionMessage(LANG_MULTILANG_UPDATE, 'success');
                }
                $this->redirectToAction($type);
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
			'type' => $type
        ));
    }
}