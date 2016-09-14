<?php

class actionMultilangAdd extends cmsAction {

	public function run($type = false, $parent = false, $id = false) {
		if (!$id || !$type) {
			cmsCore::error404();
		}
		
		$user = cmsUser::getInstance();
		$model = cmsCore::getModel('multilang');
		$lang = $this->getLang();

		$table_name = $this->model->ml_table_prefix . $type;
		
		$original = $model->getOriginalItem($type, $parent, $id);
		if (!$original) {
			cmsCore::error404();
		}

		$form = $this->getForm($type);

		if ($type == 'contents') {
			$content_model = cmsCore::getModel('content');
			$ctype = $content_model->getContentTypeByName($parent);
			if (!$ctype) {
				cmsCore::error404();
			}

			$table_name = $model->ml_con_table_prefix . $ctype['name'];

			$form = $model->getContentItemForm($ctype);
			$this->model->addSeoFields($form);

			$parent = false;
		}

		$is_submitted = $this->request->has('submit');
		if ($is_submitted) {
			$translate = $form->parse($this->request, $is_submitted);
			$translate['item_id'] = $original['id'];

			if ($parent) {
				$translate['parent'] = $parent;
			}

			$translate['lang'] = $lang;
			$translate['user_id'] = $user->id;
			$translate['date_last_modified'] = date("Y-m-d H:i:s");
			$errors = $form->validate($this, $translate);
			if (!$errors) {
				$translate_id = $model->addTranslate($translate, $table_name);
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
					'options' => isset($this->options) ? $this->options : false,
					'errors' => isset($errors) ? $errors : false,
					'lang' => $lang,
					'type' => $type
		));
	}

}
