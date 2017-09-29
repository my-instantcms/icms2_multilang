<?php

class backendMultilang extends cmsBackend {

	public $useDefaultOptionsAction = true;
	protected $useOptions = true;
	public $supports = array('caption', 'string', 'html', 'text');

	public function actionIndex(){		
		$this->redirectToAction('objects', array('contents', 'lazy'));		
	}

	public function getBackendMenu() {

		return array(
			array(
				'title' => LANG_CP_SECTION_CONTENT,
				'url' => href_to($this->root_url, 'objects', array('contents', 'lazy'))
			),
			array(
				'title' => LANG_CP_SECTION_CTYPES,
				'url' => href_to($this->root_url, 'objects', 'ctypes')
			),
			array(
				'title' => LANG_CP_CTYPE_FIELDS,
				'url' => href_to($this->root_url, 'objects', 'fields')
			),
			array(
				'title' => LANG_CP_CTYPE_DATASETS,
				'url' => href_to($this->root_url, 'objects', 'datasets')
			),
			array(
				'title' => LANG_CATEGORY,
				'url' => href_to($this->root_url, 'objects', 'cats')
			),
			array(
				'title' => LANG_CP_SECTION_MENU,
				'url' => href_to($this->root_url, 'objects', array('menu', 'lazy'))
			),
			array(
				'title' => LANG_CP_SECTION_WIDGETS,
				'url' => href_to($this->root_url, 'objects', array('widgets', '0', 'template'))
			),
			array(
                'title' => LANG_OPTIONS,
                'url' => href_to($this->root_url, 'options')
            ),
		);

	}

	public function getLang(){
		$lang = cmsCore::getLanguageName();		
		$lang = ($lang == $this->cms_config->language) ? 'en' : $lang;		
		return $lang;
	}

}