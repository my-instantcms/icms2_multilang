<?php

class formMultilangOptions extends cmsForm {

    public function init() {

        return array(

            array(
                'type' => 'fieldset',
                'title' => LANG_MULTILANG_YANDEX,
                'childs' => array(

                    new fieldString('key', array(
                        'title' => LANG_MULTILANG_API_KEY,
                        'hint' => LANG_MULTILANG_API_KEY_HINT,
                    )),

                )
            )

        );

    }

}
