<?php

class onMultilangEngineStart extends cmsAction {
    
    public function run(){

		$langs = cmsCore::getLanguages();

		if($langs){

			foreach($langs as $lang){

				$link = $this->cms_config->host. '/' . $lang . $_SERVER['REQUEST_URI'];
				if($lang == $this->cms_config->language){
					$link = $this->cms_config->host . $_SERVER['REQUEST_URI'];
				}

				$this->cms_template->addHead('<link rel="alternate" href="'.$link.'" hreflang="'.$lang.'" />');

			}
			
		}

    }

}
