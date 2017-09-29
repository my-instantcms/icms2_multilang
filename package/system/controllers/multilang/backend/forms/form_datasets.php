<?php

class formMultilangDatasets extends cmsForm {
	
    public function init() {
		
        return array(
		
            array(
                'type' => 'fieldset',
                'childs' => array(
				
                    new fieldString('title', array(
                        'title' => LANG_TITLE,
                        'rules' => array(
                            array('required'),
                            array('max_length', 100),
                            array('min_length', 1)
                        )
                    )),
					
					new fieldHtml('description', array(
                        'title' => LANG_DESCRIPTION,
						'options' => array('editor' => cmsConfig::get('default_editor'))
                    )),
					
					new fieldString('seo_title', array(
						'title' => LANG_SEO_TITLE,
                        'options'=>array(
                            'max_length'=> 256
                        )
                    )),

                    new fieldString('seo_keys', array(
						'title' => LANG_SEO_KEYS,
						'hint' => LANG_SEO_KEYS_HINT,
                        'options'=>array(
                            'max_length'=> 256
                        )
                    )),

                    new fieldString('seo_desc', array(
						'title' => LANG_SEO_DESC,
						'hint' => LANG_SEO_DESC_HINT,
                        'options'=>array(
                            'max_length'=> 256
                        )
                    )),
					
                )
            )
			
        );
		
    }
	
}