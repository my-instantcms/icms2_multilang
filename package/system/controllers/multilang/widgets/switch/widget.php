<?php
class widgetMultilangSwitch extends cmsWidget {

    public function run(){
		
		$user_lang = 'ru';
		if(isset($_SESSION['language'])){
			$user_lang = $_SESSION['language'];
		}
		if(isset($_SESSION['user']['language'])){
			$user_lang = $_SESSION['user']['language'];
		}
        return array('user_lang' => $user_lang);

    }

}
