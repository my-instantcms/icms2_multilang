<?php

class formMultilangCtypes extends cmsForm {
	
    public function init() {
		
        return array(
		
            array(
                'type' => 'fieldset',
                'childs' => array(
				
                    new fieldString('title', array(
                        'title' => LANG_TITLE,
                        'rules' => array(
                            array('required'),
                            array('max_length', 75),
                            array('min_length', 3)
                        )
                    )),

                    new fieldHtml('description', array(
                        'title' => LANG_DESCRIPTION
                    )),
					
					new fieldString('labels:one', array(
                        'title' => LANG_CP_NUMERALS_1_LABEL,
                        'rules' => array(
                            array('required'),
                            array('max_length', 100)
                        )
                    )),
					
                    new fieldString('labels:two', array(
                        'title' => LANG_CP_NUMERALS_2_LABEL,
                        'rules' => array(
                            array('required'),
                            array('max_length', 100)
                        )
                    )),
					
                    new fieldString('labels:many', array(
                        'title' => LANG_CP_NUMERALS_10_LABEL,
                        'rules' => array(
                            array('required'),
                            array('max_length', 100)
                        )
                    )),
					
					new fieldString('labels:create', array(
                        'title' => LANG_CP_ACTION_ADD_LABEL,
                        'rules' => array(
                            array('required'),
                            array('max_length', 100)
                        )
                    )),

                )
            ),
			array(
                'type' => 'fieldset',
                'title' => LANG_CP_LIST_LABELS,
                'childs' => array(
                    new fieldString('labels:list', array(
                        'title' => LANG_CP_LIST_LABEL,
                        'hint' => LANG_CP_LIST_LABELS_HINT,
                        'rules' => array(
                            array('max_length', 100)
                        )
                    )),
                    new fieldString('labels:profile', array(
                        'title' => LANG_CP_PROFILE_LABEL,
                        'hint' => LANG_CP_LIST_LABELS_HINT,
                        'rules' => array(
                            array('max_length', 100)
                        )
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