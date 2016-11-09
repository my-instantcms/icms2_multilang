<?php

class onMultilangCtypeFieldBeforeDelete extends cmsAction {

    public function run($data){

        list($field, $ctype_name, $model) = $data;

		$is_exists = $model->db->query("SELECT id FROM {#}multilang_con_" . $ctype_name, false, true);
		
		if ($is_exists) {
			
			$query = "ALTER TABLE `{#}multilang_con_{$ctype_name}` DROP `{$field['name']}`;";
			$model->db->query($query);

		}

        return array($field, $ctype_name, $model);

    }

}
