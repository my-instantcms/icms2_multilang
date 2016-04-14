<?php 
	$this->addCSS('templates/default/controllers/multilang/css/admin.css');
	$this->setPageTitle(LANG_CP_SECTION_CTYPES);
    $this->addBreadcrumb(LANG_CP_SECTION_CTYPES, $this->href_to('menu'));
	$this->addToolButton(array(
		'class' => 'help',
		'title' => LANG_HELP,
		'target' => '_blank',
		'href'  => LANG_MULTILANG_HELP_URL
	));
	$langs = cmsCore::getLanguages();
	$active = false;
	$flags = false;	
	$select_lang = 'en';
	if(isset($_SESSION['language'])){$select_lang = $_SESSION['language'];}
	if(isset($_SESSION['user']['language'])){$select_lang = $_SESSION['user']['language'];}
	$select_lang = ($select_lang == $this->controller->cms_config->cfg_language) ? 'en' : $select_lang;
	if($langs){
		foreach($langs as $lang){
			if($lang == $this->controller->cms_config->cfg_language){$active .= ' disable';}
			if($lang == $select_lang){$active .= 'active';}
			$flags .= '<a class="'.$active.'" id="'.$lang.'"><img src="/templates/default/controllers/multilang/flags/'.$lang.'.png"></a>';
			$active = '';
		}
		
	}

	$this->renderGrid($this->href_to('ctypes_ajax'), $grid); 

?>
<script type="text/javascript">
	$(function(){
		<?php if($flags){ ?>
			$('.cp_toolbar ul').append('<li class="ml_langs"><?php echo $flags; ?></li>');
		<?php } ?>
		$(".cp_toolbar ul li.ml_langs a").on("click", function(){
			if($(this).hasClass('disable')){return;}
			$(".cp_toolbar ul li.ml_langs a").removeClass('active');
			$(this).addClass('active');
			var lang = $(this).attr('id') ? $(this).attr('id') : 'en';
			$.post('/multilang/sessionlang', {lang : lang}, function(result){
				if(result.error){
					alert('<?php html(LANG_MULTILANG_ERROR); ?>');
				} else {
					icms.datagrid.loadRows();
				}			
			}, 'json');														
		});
	});
</script>