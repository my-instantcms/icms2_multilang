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
	$btn = '<img src="/templates/default/controllers/multilang/flags/'.$lang.'.png"> '.LANG_MULTILANG_AUTO_TRANSLATE;
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.cp_toolbar ul').append('<li><a onclick="ya_get()" href="javascript:void(0)" id="ya"><?php echo $btn; ?><a></li>');
	});
	function ya_get(){
		<?php if($options && isset($options['key'])){ ?>
			$('.cp_toolbar ul li a img').attr('src', '/templates/default/images/loading.gif');
			var key = '<?php echo $options['key'] ? $options['key'] : false; ?>';
			if(key){
				var text = $('form #title');
				var param = '?key='+key+'&text='+text.val()+'&lang=ru-<?php html($lang); ?>';
				$.post('https://translate.yandex.net/api/v1.5/tr.json/translate'+param, false)
				.done(function(result){
					text.val(result.text[0]);
					$('.cp_toolbar ul li a#ya').html('<?php echo $btn; ?>');
				}).fail(function(xhr){alert(xhr.responseJSON.message);});
			} else {alert('<?php html(LANG_MULTILANG_ERROR_API_KEY); ?>');}
		<?php } else { ?>
			alert('<?php html(LANG_MULTILANG_ERROR_API_KEY); ?>');
		<?php } ?>
	}
</script>