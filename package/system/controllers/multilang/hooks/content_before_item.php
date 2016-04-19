<?php  

class onMultilangContentBeforeItem extends cmsAction { 

    public function run($data){	
		list($c, $i, $f) = $data;
		$url_lang = $this->getUrlLang();
		$user_lang = $url_lang ? $url_lang : 'ru';
		if(isset($_SESSION['language'])){
			$user_lang = $_SESSION['language'];
		}
		if(isset($_SESSION['user']['language'])){
			$user_lang = $_SESSION['user']['language'];
		}
		if($user_lang !== $this->cms_config->cfg_language){
			$this->model->selectOnly('i.id, i.title, i.content');
			$this->model->filterEqual('item_id', $i['id'])->filterEqual('parent', $c['name'])->filterEqual('lang', $user_lang);
			$is_translate = $this->model->getItem('multilang_contents');
			if($is_translate){
				unset($is_translate['id']);
				$i = array_merge($i, $is_translate);
				$f['content']['html'] = $is_translate['content'];
			}
			$this->model->selectOnly('i.id, i.title, i.labels');
			$this->model->filterEqual('item_id', $c['id'])->filterEqual('lang', $user_lang);
			$t_ctype = $this->model->getItem('multilang_ctypes', function($item, $model){
				$item['labels'] = cmsModel::yamlToArray($item['labels']);
				return $item;
			});
			if($t_ctype){unset($t_ctype['id']);$c = array_merge($c, $t_ctype);}
		}
        return array($c, $i, $f);
    }

}
