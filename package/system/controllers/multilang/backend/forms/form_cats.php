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
					
                )
            )
			
        );
		
    }
	
}