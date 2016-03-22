<?php

class onMultilangEngineStart extends cmsAction {
    
    public function run(){
		if($this->cms_core->request->has('lang')){
			$lang = $this->cms_core->request->get('lang', '');
			if($lang){
				$langs = cmsCore::getLanguages();
				$is_lang = in_array($lang, $langs);
				if($is_lang){cmsUser::sessionSet('user:language', $lang);}
			}
		}
    }

}
