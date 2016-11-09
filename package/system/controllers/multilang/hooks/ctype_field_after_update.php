<?php

class onMultilangCtypeFieldAfterUpdate extends cmsAction {

    public function run($data){

        list($field, $ctype_name, $model) = $data;

		$is_exists = $model->db->query("SELECT id FROM {#}multilang_con_" . $ctype_name, false, true);
		
		if ($is_exists) {
			
			$supports = array('caption', 'string', 'html', 'text');
			
			if (in_array($field['type'], $supports)) {

				if(!$model->db->isFieldExists('multilang_con_' . $ctype_name, $field['name'])){

					if($field['type'] == 'html' || $field['type'] == 'text'){
						$attr = 'text NULL DEFAULT NULL';
					} else {
						$attr = 'VARCHAR(255) NULL DEFAULT NULL';
					}

					$query = "ALTER TABLE `{#}multilang_con_{$ctype_name}` ADD `{$field['name']}` {$attr};";
					$model->db->query($query);

				}

			}

		}

        return array($field, $ctype_name, $model);

    }

}
