<?php

class formMultilangMenu extends cmsForm {
	
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
					
                )
            )
			
        );
		
    }
	
}