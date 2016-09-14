<?php

class backendMultilang extends cmsBackend {
	
	public $useDefaultOptionsAction = true;
	protected $useOptions = true;
	
	public function actionIndex(){		
		$this->redirectToAction('contents');		
	}
	
	public function getBackendMenu() {		
		return array(
			array(
				'title' => LANG_CP_SECTION_CONTENT,
				'url' => href_to($this->root_url, 'contents')
			),
			array(
				'title' => LANG_CP_CTYPE_FIELDS,
				'url' => href_to($this->root_url, 'fields')
			),
			array(
				'title' => LANG_CP_SECTION_CTYPES,
				'url' => href_to($this->root_url, 'ctypes')
			),
			array(
				'title' => LANG_CP_SECTION_MENU,
				'url' => href_to($this->root_url, 'menu')
			),
			array(
				'title' => LANG_CP_SECTION_WIDGETS,
				'url' => href_to($this->root_url, 'widgets')
			),
			array(
                'title' => LANG_OPTIONS,
                'url' => href_to($this->root_url, 'options')
            ),
			array(
                'title' => LANG_SYNC,
                'url' => href_to($this->root_url, 'sync')
            ),
		);		
	}
	
	public function getLang(){
		$auto_lang = $this->model->getAutolang();
		$lang = $auto_lang;
		
		if(isset($_SESSION['language'])){$lang = $_SESSION['language'];}
		if(isset($_SESSION['user']['language'])){$lang = $_SESSION['user']['language'];}
		$lang = ($lang == $this->cms_config->cfg_language) ? $auto_lang : $lang;
		return $lang;
	}
	
}

