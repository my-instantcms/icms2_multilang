<?php

class widgetMultilangSwitch extends cmsWidget {

	public function run() {

		$config = cmsConfig::getInstance();
		$user_lang = $config->cfg_language;

		if (isset($_SESSION['language'])) {
			$user_lang = $_SESSION['language'];
		}
		if (isset($_SESSION['user']['language'])) {
			$user_lang = $_SESSION['user']['language'];
		}
		return array('user_lang' => $user_lang);
	}

}
