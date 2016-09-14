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
	$is_page = isset($this->controller->current_params[3]) ? $this->controller->current_params[3] : false;
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
					<?php if(!isset($original['content'])){ ?>$('.cp_toolbar ul a#ya').html('<?php echo $btn; ?>');<?php } ?>
				}).fail(function(xhr){alert(xhr.responseJSON.message);});
				<?php if(isset($original['content']) && $original['content']){ ?>
					<?php 
						$item_id = ($do == 'add') ? $original['id'] : $original['item_id'];
						$param = $item_id.'/'.$lang.'/'.$is_page; 
					?>
					$.post('/multilang/translation/<?php echo $param; ?>', false, function(result){
						if(result.error){
							alert(result.translate);
						} else {
							$('#f_content .redactor-editor').html(result.translate);
							$('#f_content textarea#content').val(result.translate);
							$('.cp_toolbar ul li a#ya').html('<?php echo $btn; ?>');
						}			
					}, 'json');
				<?php } ?>
				<?php if(isset($original['teaser']) && $original['teaser']){ ?>
					<?php 
						$item_id = ($do == 'add') ? $original['id'] : $original['item_id'];
						$param = $item_id.'/'.$lang.'/'.$is_page.'/teaser'; 
					?>
					$.post('/multilang/translation/<?php echo $param; ?>', false, function(result){
						if(result.error){
							alert(result.translate);
						} else {
							$('#f_teaser textarea#teaser').val(result.translate);
							$('.cp_toolbar ul li a#ya').html('<?php echo $btn; ?>');
						}			
					}, 'json');
				<?php } ?>
			} else {alert('<?php html(LANG_MULTILANG_ERROR_API_KEY); ?>');}
		<?php } else { ?>
			alert('<?php html(LANG_MULTILANG_ERROR_API_KEY); ?>');
		<?php } ?>
	}
</script>