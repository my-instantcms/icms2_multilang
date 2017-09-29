<?php

function grid_objects($self, $grid_field = false){

    $options = array(
        'is_auto_init' => false,
		'is_sortable' => false,
		'is_filter' => false,
		'is_pagination' => false
    );

    $columns = array(
        'id' => array(
            'title' => 'id',
            'width' => 30,
            'filter' => 'exact'
        ),
        'title' => array(
            'title' => LANG_TITLE,
            'href' => href_to($self->root_url, 'edit/' . $self->current_params[2], array('{parent}', '{id}')),
            'filter' => 'like',
			'handler' => function($title, $row)  use ($self){
				$url = href_to($self->root_url, 'add/' . $self->current_params[2], array($row['parent'], $row['id']));
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
	
	if($grid_field){
		$title = 'LANG_MULTILANG_FIELD_' . strtoupper($grid_field);
		$columns[$grid_field] = array(
            'title' => constant($title),
        );
	}

    $actions = array(
		array(
            'title' => LANG_MULTILANG_ADD_TRANSLATE,
            'class' => 'play',
            'href' => href_to($self->root_url, 'add/' . $self->current_params[2], array('{parent}', '{id}')),
			'handler' => function ($row){
				return $row['translated'] ? false : true;
			}
        ),
        array(
            'title' => LANG_EDIT,
            'class' => 'edit',
            'href' => href_to($self->root_url, 'edit/' . $self->current_params[2], array('{parent}', '{id}')),
			'handler' => function ($row){
				return $row['translated'] ? true : false;
			}
        ),
        array(
            'title' => LANG_DELETE,
            'class' => 'delete',
            'href' => href_to($self->root_url, 'delete/' . $self->current_params[2], array('{parent}', '{id}')),
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

