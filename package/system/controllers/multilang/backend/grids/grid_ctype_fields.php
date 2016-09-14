<?php

function grid_ctype_fields($controller){

    $options = array(
        'is_sortable' => false,
        'is_filter' => false,
        'is_pagination' => false,
        'is_draggable' => false,
        'order_by' => 'ordering',
        'order_to' => 'asc',
        'show_id' => false
    );

    $columns = array(
        'id' => array(
            'title' => 'id',
            'width' => 30,
        ),
        'title' => array(
            'title' => LANG_CP_FIELD_TITLE,
			'href' => href_to($controller->root_url, 'edit/fields', array('{parent}', '{id}')),
            'filter' => 'like',
			'handler' => function($title, $row)  use ($controller){
				$url = href_to($controller->root_url, 'add/fields', array($row['parent'], $row['id']));
				return $row['translated'] ? $title : '<a href="'.$url.'">'.$title.'</a>';
			}
        ),
        'name' => array(
            'title' => LANG_SYSTEM_NAME,
        ),
        'type' => array(
            'title' => LANG_CP_FIELD_TYPE,
        ),
		'translated' => array(
            'title' => LANG_MULTILANG_TRANSLATE,
			'handler' => function ($translated){
				return $translated ? LANG_YES : LANG_NO;
			}
        )
    );

    $actions = array(
		array(
            'title' => LANG_MULTILANG_ADD_TRANSLATE,
            'class' => 'play',
            'href' => href_to($controller->root_url, 'add/fields', array('{parent}', '{id}')),
			'handler' => function ($row){
				return $row['translated'] ? false : true;
			}
        ),
        array(
            'title' => LANG_EDIT,
            'class' => 'edit',
            'href' => href_to($controller->root_url, 'edit/fields', array('{parent}', '{id}')),
			'handler' => function ($row){
				return $row['translated'] ? true : false;
			}
        ),
        array(
            'title' => LANG_DELETE,
            'class' => 'delete',
            'href' => href_to($controller->root_url, 'delete/fields', array('{parent}', '{id}')),
			'handler' => function ($row){
				return $row['translated'] ? true : false;
			},
            'confirm' => LANG_MULTILANG_DEL_TRANSLATE
        )
    );

    return array(
        'options' => $options,
        'columns' => $columns,
        'actions' => $actions
    );

}

