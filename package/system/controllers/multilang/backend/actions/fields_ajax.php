<?php

class actionMultilangFieldsAjax extends cmsAction {

	public function run($id = false) {
		if (!$id || !$this->request->isAjax()) {
			cmsCore::error404();
		}

		$lang = $this->getLang();

		$model = cmsCore::getModel('multilang');
		$content_model = cmsCore::getModel('content');

		$ctype = $content_model->getContentType($id);

		if (!$ctype) {
			cmsCore::error404();
		}

		$fields = $content_model->selectOnly('i.id, i.name, i.title, i.type, i.ctype_id, f.item_id as translated')
				->filterEqual('ctype_id', $id)
				//->filterIn('type', $model->getAllowedFieldTypes())
				->joinLeft($model->ml_table_prefix . 'fields', 'f', 'f.item_id = i.id and f.lang = "' . $lang . '" and f.parent = "' . $ctype['name'] . '"')
				->get($model->table_prefix . $ctype['name'] . '_fields', function($item, $model) use ($ctype) {
			$item['parent'] = $ctype['name'];
			return $item;
		});

		$grid = $this->loadDataGrid('ctype_fields');
		$this->cms_template->renderGridRowsJSON($grid, $fields);

		$this->halt();
	}

}
