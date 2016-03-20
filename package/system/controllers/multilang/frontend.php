<?php

class multilang extends cmsFrontend {
	
	public function actionSetlang($lang = false){
		$result = cmsUser::sessionSet('user:language', $lang);
		$this->redirectBack();
	}
	
	public function actionSessionlang(){
		if(!$this->request->isAjax()){$this->cms_template->renderJSON(array('error'=>true));}
		$lang = $this->request->get('lang');
		if(!$lang){$this->cms_template->renderJSON(array('error'=>true));}
		$result = cmsUser::sessionSet('user:language', $lang);
		$this->cms_template->renderJSON(array('error'=>$result));
	}
	
}