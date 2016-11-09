<?php

class formMultilangWidgets extends cmsForm {

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

					new fieldText('links',array(
						'title' => LANG_WIDGET_TITLE_LINKS,
						'hint' => LANG_WIDGET_TITLE_LINKS_HINT,
					))

                )
            )

        );

    }

}