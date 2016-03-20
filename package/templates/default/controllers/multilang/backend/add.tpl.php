<?php
	$title = ($do == 'add') ? LANG_MULTILANG_ADD_TRANSLATE : LANG_MULTILANG_EDIT_TRANSLATE;
    $this->setPageTitle($title);
    $this->addBreadcrumb($title);
	$this->addToolButton(array(
		'class' => 'save',
		'title' => LANG_SAVE,
		'href'  => "javascript:icms.forms.submit()"
	));
	$this->renderForm($form, $original, array(
		'action' => '',
		'method' => 'post'
	), $errors);
	$lang = '<span>'.LANG_MULTILANG_LANG.' <img src="/templates/default/controllers/multilang/flags/'.$lang.'.png"></span>';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.cp_toolbar ul').append('<li class="ml_langs"><?php echo $lang; ?></li>');
	});
</script>