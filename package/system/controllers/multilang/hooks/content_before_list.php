<?php

class onMultilangContentBeforeList extends cmsAction {

    public function run($data){

        list($c, $i) = $data;
        if(!$i){return $data;}
		
		$user_lang = 'ru';
		if(isset($_SESSION['language'])){
			$user_lang = $_SESSION['language'];
		}
		if(isset($_SESSION['user']['language'])){
			$user_lang = $_SESSION['user']['language'];
		}
		
		if($user_lang !== $this->cms_config->cfg_language){
			$is_teaser = $this->model->db->isFieldExists('con_' . $c['name'], 'teaser');
			$field = $is_teaser ? ', i.teaser' : '';
			if($c['name'] == 'albums'){$field = ', i.content';}
			$this->model->selectOnly('i.id, i.title, i.item_id' . $field);
			$this->model->filterEqual('parent', $c['name'])->filterEqual('lang', $user_lang);
			$is_translate = $this->model->get('multilang_contents');
			if($is_translate){
				foreach($is_translate as $t){
					if(isset($i[$t['item_id']])){$i[$t['item_id']] = array_merge($i[$t['item_id']], $t);}
				}
			}
		}

        $data = array($c, $i);

        return $data;

    }

}