<?php

class onMultilangContentAfterDelete extends cmsAction {

    public function run($data){
		
		list($ctype, $item) = $data;
		
		cmsCache::getInstance()->clean("multilang.multilang_con_{$data['ctype_name']}");

        $this->model->filterEqual('i.item_id', $data['item']['id'])->deleteFiltered('multilang_con_' . $data['ctype_name']);

        return true;

    }

}
