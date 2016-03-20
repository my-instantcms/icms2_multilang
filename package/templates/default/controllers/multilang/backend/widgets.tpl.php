<?php
    $this->addCSS('templates/default/css/datatree.css');
    $this->addCSS('templates/default/controllers/multilang/css/admin.css');
    $this->addJS('templates/default/js/jquery-ui.js');
    $this->addJS('templates/default/js/jquery-cookie.js');
    $this->addJS('templates/default/js/datatree.js');
    $this->addJS('templates/default/js/admin-content.js');
    $this->setPageTitle(LANG_CP_SECTION_WIDGETS);
    $this->addBreadcrumb(LANG_CP_SECTION_WIDGETS, $this->href_to('widgets'));
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
?>
<br>
<table class="layout">
    <tr>
        <td class="sidebar" valign="top">
            <div id="datatree">
                <ul id="treeData" style="display: none">
                    <?php foreach($widgets as $id=>$widget){ ?>
                        <li id="<?php echo $widget['id'];?>" class="folder"><?php echo $widget['title']; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <script type="text/javascript">
                    $(function(){
						<?php if($flags){ ?>
						$('.cp_toolbar ul').append('<li class="ml_langs"><?php echo $flags; ?></li>');
						<?php } ?>
                        $("#datatree").dynatree({
                            debugLevel: 0,
                            onPostInit: function(isReloading, isError){
                                var path = $.cookie('icms[widget_tree_path]');
                                if(!path){path = '1';}
                                if (path) {
                                    $("#datatree").dynatree("getTree").loadKeyPath(path, function(node, status){
                                        if(status == "loaded") {
                                            node.expand();
                                        }else if(status == "ok") {
                                            node.activate();
                                            node.expand();
                                            icms.datagrid.init();
                                        }
                                    });
                                }
                            },
                            onActivate: function(node){
                                node.expand();
                                $.cookie('icms[widget_tree_path]', node.getKeyPath(), {expires: 7, path: '/'});
                                var k = node.data.key;
                                icms.datagrid.setURL("<?php echo $this->href_to('widgets_ajax'); ?>/" + k);
								icms.datagrid.loadRows();
                            }
                        });
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
        </td>
        <td class="main" valign="top">
			<?php $this->renderGrid(false, $grid); ?>
		</td>
    </tr>
</table>
