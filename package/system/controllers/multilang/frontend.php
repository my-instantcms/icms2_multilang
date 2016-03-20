<?php

class multilang extends cmsFrontend {
	
	public function actionSetlang($lang = false){
		if(!$lang){cmsCore::error404();}
		$langs = cmsCore::getLanguages();
		$is_lang = in_array($lang, $langs);
		if(!$is_lang){cmsCore::error404();}
		$result = cmsUser::sessionSet('user:language', $lang);
		$this->redirectBack();
	}
	
	public function actionSessionlang(){
		if(!$this->request->isAjax()){$this->cms_template->renderJSON(array('error'=>true));}
		$lang = $this->request->get('lang', '');
		if(!$lang){$this->cms_template->renderJSON(array('error'=>true));}
		$langs = cmsCore::getLanguages();
		$is_lang = in_array($lang, $langs);
		if(!$is_lang){$this->cms_template->renderJSON(array('error'=>true));}
		$result = cmsUser::sessionSet('user:language', $lang);
		$this->cms_template->renderJSON(array('error'=>$result));
	}
	
}