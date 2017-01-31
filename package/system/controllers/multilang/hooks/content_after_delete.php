<?php

class onMultilangContentAfterDelete extends cmsAction {

    public function run($data){

        $this->model->filterEqual('i.item_id', $data['item']['id'])->deleteFiltered('multilang_con_' . $data['ctype_name']);

        return true;

    }

}
