<?php

	$this->addBreadcrumb(LANG_OPTIONS);
	
	$this->addToolButton(array(
		'class' => 'save',
		'title' => LANG_SAVE,
		'href'  => "javascript:icms.forms.submit()"
	));

	$this->renderForm($form, $options, array(
		'action' => '',
		'method' => 'post'
	), $errors);
?>