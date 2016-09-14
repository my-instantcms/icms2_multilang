<?php

class actionMultilangDelete extends cmsAction {

	public function run($type = false, $parent = false, $id = false) {

		if (!$type || !$id) {
			cmsCore::error404();
		}

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

		if ($type == 'ctypes') {
			$parent = false;
		}

		$translate = $model->filterEqual('lang', $lang)->getReadyItem($table_name, $parent, $id);
		if (!$translate) {
			cmsCore::error404();
		}
		$translate_id = $model->delete($table_name, $translate['id']);
		if ($translate_id) {
			cmsUser::addSessionMessage(LANG_MULTILANG_DELETE, 'success');
		}
		$this->redirectToAction($type);
	}

}
