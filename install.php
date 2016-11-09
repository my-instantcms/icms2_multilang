<?php

function install_package(){
	
	$model = new cmsModel();

	$ctypes = $model->selectOnly('i.id, i.name')->get('content_types');
	if (!$ctypes) { dump('Ошибка. Типы контента не найдены'); }
	
	$supports = array('caption', 'string', 'html', 'text');
	
	foreach($ctypes as $id => $ctype) {

		$fields = $model->selectOnly('i.id, i.name, i.type')->
			filterNotEqual('name', 'title')->
			filterNotEqual('name', 'content')->
			filterIn('type', $supports)->
			filterEqual('i.ctype_id', $id)->get('con_' . $ctype['name'] . '_fields');

		$sql = "CREATE TABLE IF NOT EXISTS `{#}multilang_con_{$ctype['name']}` (`id` int(11) NOT NULL AUTO_INCREMENT, `item_id` int(11) NOT NULL, `lang` varchar(6) NOT NULL, `title` varchar(100) NOT NULL, `content` text, `seo_keys` text, `seo_desc` text, `seo_title` varchar(255) DEFAULT NULL, ";

		if($fields){
			$types = array(
				'caption' => 'varchar(255) NULL DEFAULT NULL',
				'string' => 'varchar(255) NULL DEFAULT NULL',
				'html' => 'text',
				'text' => 'text',
			);
			foreach($fields as $field){
				$type = isset($types[$field['type']]) ? $types[$field['type']] : 'text';
				$sql .= "`{$field['name']}` {$type}, ";
			}
		}
		
		$sql .= "PRIMARY KEY (`id`), KEY `item_id` (`item_id`,`lang`), KEY `parent` (`lang`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
		
		$result = $model->db->query($sql, false, true);
		
		if ( !$result ) { dump('Ошибка. Не удалось создать таблицы контента'); }
		
	}
	
	return true;
}