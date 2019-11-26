<?php

class formMultilangCats extends cmsForm {
	
    public function init() {
		
        return array(
		
            array(
                'type' => 'fieldset',
                'childs' => array(
				
                    new fieldString('title', array(
                        'title' => LANG_TITLE,
                        'rules' => array(
                            array('required'),
                            array('max_length', 200),
                            array('min_length', 1)
                        )
                    )),
					
					new fieldHtml('description', array(
                        'title' => LANG_DESCRIPTION
                    )),
					
                )
            ),

			'seo' => array(
				'type' => 'fieldset',
				'title' => LANG_CP_SEOMETA_DEFAULT,
				'childs' => array(
					new fieldString('seo_title', array(
						'title' => LANG_SEO_TITLE,
					)),
					new fieldString('seo_keys', array(
						'title' => LANG_SEO_KEYS,
						'hint' => LANG_SEO_KEYS_HINT,
					)),
					new fieldText('seo_desc', array(
						'title' => LANG_SEO_DESC,
						'hint' => LANG_SEO_DESC_HINT,
					))
				)
			)
			
        );
		
    }
	
}