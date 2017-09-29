<?php

	$title = ($do == 'add') ? LANG_MULTILANG_ADD_TRANSLATE : LANG_MULTILANG_EDIT_TRANSLATE;

    $this->setPageTitle($title);
    $this->addBreadcrumb($title);

	$this->addToolButton(array(
		'class' => 'save',
		'title' => LANG_SAVE,
		'href'  => "javascript:icms.forms.submit()"
	));

	if($type == 'ctypes'){
		$original['labels'] = cmsModel::yamlToArray($original['labels']);
	}

	$this->renderForm($form, $original, array(
		'action' => '',
		'method' => 'post'
	), $errors);

	$flag = '/templates/default/controllers/multilang/flags/'.$lang.'.png';
	$btn = '<a onclick="ya_get(this)" href="javascript:void(0)" id="ya">';
	$btn .= '<img src="' . $flag . '"> ' . LANG_MULTILANG_AUTO_TRANSLATE;
	$btn .= '</a>';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('form .field label').append('<?php echo $btn; ?>');
	});
	function ya_get(button){
		<?php if($options && isset($options['key'])){ ?>
			button = $(button);
			$('img', button).attr('src', '/templates/default/images/loading.gif');
			var key = '<?php echo $options['key'] ? $options['key'] : false; ?>';
			if(key){
				var block = $(button).parents('.field');
				var field = $('input, textarea', block).attr('name');
				if(field){
					<?php $url = '/multilang/translation/' . $type . '/' . $parent . '/' . $id . '/' . $lang; ?>
					$.post('<?php html($url); ?>', {field : field}, function(result){
						if(result.error){
							alert(result.translate);
						} else {
							$('form input[name="'+field+'"], form textarea[name="'+field+'"]').val(result.translate);
							if ( $( 'form #f_'+field+' .redactor_editor' ).length ) {
								$('form #f_'+field+' .redactor_editor').html(result.translate);
							}
							$('img', button).attr('src', '<?php html($flag); ?>');
						}			
					}, 'json');
				}
			} else {alert('<?php html(LANG_MULTILANG_ERROR_API_KEY); ?>');}
		<?php } else { ?>
			alert('<?php html(LANG_MULTILANG_ERROR_API_KEY); ?>');
		<?php } ?>
	}
</script>
<style>form .field label a{margin-left:10px;text-decoration:none}</style>