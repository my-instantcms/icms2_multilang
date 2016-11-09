<?php

class onMultilangCtypeAfterDelete extends cmsAction {

    public function run($ctype){

        $this->model->filterEqual('i.item_id', $ctype['id'])->deleteFiltered('multilang_ctypes');
		$this->model->db->dropTable('multilang_con_' . $ctype['name']);
        $this->model->filterEqual('i.parent', $ctype['name'])->deleteFiltered('multilang_cats');

        return $ctype;

    }

}
