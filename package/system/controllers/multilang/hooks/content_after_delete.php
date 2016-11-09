<?php

class onMultilangContentAfterDelete extends cmsAction {

    public function run($data){
		
		list($ctype, $item) = $data;

        $this->model->filterEqual('i.item_id', $item['id'])->deleteFiltered('multilang_con_' . $ctype['name']);

        return true;

    }

}
