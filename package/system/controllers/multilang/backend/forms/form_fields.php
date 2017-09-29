<?php

class formMultilangFields extends cmsForm {
	
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
					
					new fieldString('hint', array(
                        'title' => LANG_DESCRIPTION,
                        'rules' => array(
                            array('max_length', 200),
                            array('min_length', 1)
                        )
                    )),
					
                )
            )
			
        );
		
    }
	
}