<?php

class actionMultilangEdit extends cmsAction {

	public function run($type = false, $parent = false, $id = false) {
		if (!$id || !$type) {
			cmsCore::error404();
		}

		$user = cmsUser::getInstance();
		$model = cmsCore::getModel('multilang');
		$lang = $this->getLang();

		$table_name = $this->model->ml_table_prefix . $type;

		if ($type == 'contents') {
			$content_model = cmsCore::getModel('content');
			$ctype = $content_model->getContentTypeByName($parent);
			if (!$ctype) {
				cmsCore::error404();
			}

			$table_name = $model->ml_con_table_prefix . $ctype['name'];
			$parent = false;
		}

		$translate = $model->filterEqual('lang', $lang)->getReadyItem($table_name, $parent, $id);

		if (!$translate) {
			cmsCore::error404();
		}

		if ($type == 'contents') {
			$form = $model->getContentItemForm($ctype);
			$this->model->addSeoFields($form);
		} else {
			$form = $this->getForm($type);
		}

		$is_submitted = $this->request->has('submit');
		if ($is_submitted) {
			$id = $translate['id'];
			$translate = $form->parse($this->request, $is_submitted);
			$errors = $form->validate($this, $translate);
			if (!$errors) {
				$translate['user_id'] = $user->id;
				$translate['date_last_modified'] = date("Y-m-d H:i:s");
				$translate_id = $model->updTranslate($translate, $id, $table_name);
				if ($translate_id) {
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
