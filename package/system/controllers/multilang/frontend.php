<?php

class multilang extends cmsFrontend {
	
	protected $useOptions = true;
	
	public function actionSetlang($lang = false){
		
		if (!$lang){ cmsCore::error404(); }
		
		$langs = cmsCore::getLanguages();
		$is_lang = in_array($lang, $langs);
		if (!$is_lang){ cmsCore::error404(); }
		
		$segments = explode('/', mb_substr($_SERVER['HTTP_REFERER'], mb_strlen($this->cms_config->host.'/')));
		
		if (isset($segments[0]) && preg_match('/^[a-z]{2}$/i', $segments[0]) && in_array($segments[0], $langs)) {
			
			if ($lang == $this->cms_config->language) { unset($segments[0]); } else { $segments[0] = $lang; }
			$_SERVER['HTTP_REFERER'] = $this->cms_config->host.'/'.implode('/', $segments);
			
		} else {
			
			$segments[0] = $lang . '/' . $segments[0];
			$_SERVER['HTTP_REFERER'] = $this->cms_config->host.'/'.implode('/', $segments);
			
		}
		
		$this->redirectBack();
		
	}
	
	public function getUrlLang(){
		$segments = explode('/', mb_substr($_SERVER['REDIRECT_URL'], mb_strlen($this->cms_config->root)));
		if (!empty($segments[0])) {
			$may_be_lang = $segments[0];
			$langs = cmsCore::getLanguages();
			if(in_array($may_be_lang, $langs)){
				return $may_be_lang;
			}
		}
		return false;
	}
	
	public function actionTranslation($type = false, $parent = false, $id = false, $to_lang = 'en'){

		if ( !$this->request->isAjax() || !$type || !$parent || !$id) {
			$this->cms_template->renderJSON(array('error' => true, 'translate' => LANG_ERROR)); 
		}

		$field = $this->request->get('field', '');
		if (!$field) {
			$this->cms_template->renderJSON(array('error' => true, 'translate' => LANG_ERROR)); 
		}
		
		$value = false;

		if (stripos($field, '[') !== false) {
			preg_match('#\[(.+?)\]#i', $field, $value);
			$field = strtok($field, '[');
		}
		
		$item = $this->model->selectOnly('i.id, i.' . $field)->getOriginalItem($type, $parent, $id);

		if($item && isset($item[$field]) && $item[$field] && isset($this->options['key']) && $this->options['key']){
			
			if ( isset($value[1]) && $value[1] ) {
				$result = cmsModel::yamlToArray($item[$field]);
				$item[$field] = $result[$value[1]];
			}
			
			$data = array(
				'key' => $this->options['key'],
				'text' => $item[$field],
				'lang' => $to_lang,
				'format' => 'html',
				'options' => 1
			);

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, 'https://translate.yandex.net/api/v1.5/tr.json/translate');
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24");
			$response = curl_exec($curl);
			if(curl_errno($curl)){
				$this->cms_template->renderJSON(array('error' => true, 'translate' => curl_error($curl)));
			} else { 
				curl_close($curl);
				$text = json_decode($response, true);
				if($text['code'] == 200){
					$this->cms_template->renderJSON(array('error' => false, 'translate' => $text['text'][0]));
				} else {
					$this->cms_template->renderJSON(array('error' => true, 'translate' => $text['message']));
				}
			}
		} else {
			$this->cms_template->renderJSON(array('error' => true, 'translate' => LANG_MULTILANG_NO_ITEM));
		}

    }
	
}