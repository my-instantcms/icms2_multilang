<?php

class widgetMultilangSwitch extends cmsWidget {

    public function run(){

        return array('user_lang' => cmsCore::getLanguageName());

    }

}
