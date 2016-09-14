<?php

function grid_ctypes_items($controller){

    $options = array(
        'is_auto_init' => true,
        'is_sortable' => false,
        'is_filter' => false,
        'is_pagination' => true,
        'is_draggable' => false,
        'is_selectable' => false,
        'order_by' => 'id',
        'order_to' => 'desc',
        'show_id' => true
    );

    $columns = array(
        'id' => array(
            'title' => 'id',
            'width' => 30,
            'filter' => 'exact'
        ),
        'title' => array(
            'title' => LANG_TITLE,
            'href' => href_to($controller->root_url, 'edit/ctypes', array('0', '{id}')),
            'filter' => 'like',
			'handler' => function($title, $row)  use ($controller){
				$url = href_to($controller->root_url, 'add/ctypes', array('0', $row['id']));
				return $row['translated'] ? $title : '<a href="'.$url.'">'.$title.'</a>';
			}
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
            'href' => href_to($controller->root_url, 'add/ctypes', array('0', '{id}')),
			'handler' => function ($row){
				return $row['translated'] ? false : true;
			}
        ),
        array(
            'title' => LANG_EDIT,
            'class' => 'edit',
            'href' => href_to($controller->root_url, 'edit/ctypes', array('0', '{id}')),
			'handler' => function ($row){
				return $row['translated'] ? true : false;
			}
        ),
        array(
            'title' => LANG_DELETE,
            'class' => 'delete',
            'href' => href_to($controller->root_url, 'delete/ctypes', array('0', '{id}')),
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

