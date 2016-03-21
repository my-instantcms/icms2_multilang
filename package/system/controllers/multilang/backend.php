<?php

class backendMultilang extends cmsBackend {
	
	public $useDefaultOptionsAction = true;
	
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
		);		
	}
	
	public function getLang(){
		$lang = 'en';
		if(isset($_SESSION['language'])){$lang = $_SESSION['language'];}
		if(isset($_SESSION['user']['language'])){$lang = $_SESSION['user']['language'];}
		$lang = ($lang == $this->cms_config->cfg_language) ? 'en' : $lang;
		return $lang;
	}
	
}

