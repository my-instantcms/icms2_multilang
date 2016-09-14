<?php
    $this->addCSS('templates/default/css/datatree.css');
	$this->addCSS('templates/default/controllers/multilang/css/admin.css');
    $this->addJS('templates/default/js/jquery-ui.js');
    $this->addJS('templates/default/js/jquery-cookie.js');
    $this->addJS('templates/default/js/datatree.js');
    $this->addJS('templates/default/js/admin-content.js');
	$this->addToolButton(array(
        'class' => 'help',
        'title' => LANG_HELP,
        'target' => '_blank',
        'href'  => LANG_MULTILANG_HELP_URL,
    ));
	$langs = cmsCore::getLanguages();
	$active = false;
	$flags = false;	
	$auto_lang = $this->controller->model->getAutolang();
	$select_lang = $auto_lang;
	if(isset($_SESSION['language'])){$select_lang = $_SESSION['language'];}
	if(isset($_SESSION['user']['language'])){$select_lang = $_SESSION['user']['language'];}
	$select_lang = ($select_lang == $this->controller->cms_config->cfg_language) ? $auto_lang : $select_lang;
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
                    <?php foreach($ctypes as $id=>$ctype){ ?>
                        <li id="<?php echo $ctype['id'];?>.1" class="lazy folder"><?php echo $ctype['title']; ?></li>
                    <?php } ?>
                </ul>
            </div>

            <script type="text/javascript">
                $(function(){
					<?php if($flags){ ?>
						$('.cp_toolbar ul').append('<li class="ml_langs"><?php echo $flags; ?></li>');
					<?php } ?>
                    current_ctype = 0;
                    is_loaded = false;

                    $("#datatree").dynatree({

                        debugLevel: 0,

                        onPostInit: function(isReloading, isError){
                            var path = $.cookie('icms[content_tree_path]');
                            if (!path) { path = '1.1'; }
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
                            $.cookie('icms[content_tree_path]', node.getKeyPath(), {expires: 7, path: '/'});
                            var key = node.data.key.split('.');
                            icms.datagrid.setURL("<?php echo $this->href_to('contents_ajax'); ?>/" + key[0] + "/" + key[1]);
                            if(key[0] !== current_ctype){
                                current_ctype = key[0];
                                contentCancelFilter(true);
                            }else{
                                icms.datagrid.loadRows();
                            }
                        },

                        onLazyRead: function(node){
                            node.appendAjax({
                                url: "<?php echo $this->href_to('contents', array('tree')); ?>",
                                data: {
                                    id: node.data.key
                                }
                            });
                        }

                    });
					$(".cp_toolbar ul li.ml_langs a").on("click", function(){
						if($(this).hasClass('disable')){return;}
						$(".cp_toolbar ul li.ml_langs a").removeClass('active');
						$(this).addClass('active');
						var lang = $(this).attr('id') ? $(this).attr('id') : '<?php echo $auto_lang; ?>';
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

