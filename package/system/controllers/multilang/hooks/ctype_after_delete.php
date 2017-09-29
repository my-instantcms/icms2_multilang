<?php

class onMultilangCtypeAfterDelete extends cmsAction {

    public function run($ctype){

		cmsCache::getInstance()->clean("multilang.multilang_ctypes");
        $this->model->filterEqual('i.item_id', $ctype['id'])->deleteFiltered('multilang_ctypes');
		$this->model->db->dropTable('multilang_con_' . $ctype['name']);
		cmsCache::getInstance()->clean("multilang.multilang_cats");
        $this->model->filterEqual('i.parent', $ctype['name'])->deleteFiltered('multilang_cats');

        return $ctype;

    }

}
