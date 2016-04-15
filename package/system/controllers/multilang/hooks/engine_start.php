<?php

class onMultilangEngineStart extends cmsAction {
    
    public function run(){
		$segments = explode('/', mb_substr($_SERVER['REQUEST_URI'], mb_strlen($this->cms_config->root)));
		if (!empty($segments[0])) {
			$may_be_lang = $segments[0];
			$langs = cmsCore::getLanguages();
			if(in_array($may_be_lang, $langs)){
				cmsUser::sessionSet('user:language', $may_be_lang);
				unset($segments[0]);
				$_SERVER['REQUEST_URI'] = $this->cms_config->root.implode('/', $segments);
			}
		}
    }

}
