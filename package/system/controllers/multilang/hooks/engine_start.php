<?php

class onMultilangEngineStart extends cmsAction {
    
    public function run(){
		$langs = cmsCore::getLanguages();		
		$segments = explode('/', mb_substr($_SERVER['REQUEST_URI'], mb_strlen($this->cms_config->root)));
		if (!empty($segments[0])) {
			$may_be_lang = $segments[0];
			if(in_array($may_be_lang, $langs)){
				cmsUser::sessionSet('user:language', $may_be_lang);
				unset($segments[0]);
				$_SERVER['REQUEST_URI'] = $this->cms_config->root.implode('/', $segments);
			}
		}
		if($langs){
			foreach($langs as $lang){
				$link = $this->cms_config->host. '/' . $lang . $_SERVER['REQUEST_URI'];
				if($lang == $this->cms_config->cfg_language){
					$link = $this->cms_config->host . $_SERVER['REQUEST_URI'];
				}
				$this->cms_template->addHead('<link rel="alternate" href="'.$link.'" hreflang="'.$lang.'" />');
			}
		}
    }

}
