<?php

	$this->addCSS('templates/default/controllers/multilang/css/admin.css');
	
	if($items){
		$this->addCSS('templates/default/css/datatree.css');
		$this->addJS('templates/default/js/jquery-ui.js');
		$this->addJS('templates/default/js/jquery-cookie.js');
		$this->addJS('templates/default/js/datatree.js');
	}
	
	$this->addToolButton(array(
        'class' => 'help',
        'title' => LANG_HELP,
        'target' => '_blank',
        'href'  => LANG_MULTILANG_HELP_URL,
    ));
	
	$langs = cmsCore::getLanguages();
	
	$active = false;
	$flags = false;
	$default_cookie_path = ($object == 'contents') ? '/pages.0' : '/1.0';
	
	$select_lang = (cmsCore::getLanguageName() == $this->controller->cms_config->language) ? 'en' : cmsCore::getLanguageName();
	
	if($langs){
		
		foreach($langs as $lang){
			
			$img = '/templates/default/controllers/multilang/flags/'.$lang.'.png';
			
			if($lang == $this->controller->cms_config->language){
				$active .= ' disable';
			}
			
			if($lang == $select_lang){
				$active .= 'active';
			}
			
			$flags .= '<a class="'.$active.'" id="'.$lang.'"><img src="'.$img.'"></a>';
			$active = '';
			
		}
		
	}
?>
<?php if($items){ ?>
<br>
<table class="layout">
    <tr>
        <td class="sidebar" valign="top">

            <div id="datatree">
                <ul id="treeData" style="display: none">
                    <?php foreach($items as $id=>$item){ ?>
						<?php $url = isset($item['name']) ? $item['name'] : $item['id']; ?>
                        <li id="<?php echo $url; ?>.0" class="<?php html($lazy); ?> folder"><?php echo $item['title']; ?></li>
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
                            var path = $.cookie('icms[<?php html($object); ?>_tree_path]');console.log(path);
                            if (!path) { path = '<?php html($default_cookie_path); ?>'; }
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
                            $.cookie('icms[<?php html($object); ?>_tree_path]', node.getKeyPath(), {expires: 7, path: '/'});
                            var key = node.data.key.split('.');
                            var url = "<?php echo $this->href_to('objects_ajax', $object); ?>/" + key[0] + "/" + key[1] + "/<?php html($grid_field); ?>";
                            icms.datagrid.setURL(url);
                            icms.datagrid.loadRows();
                        },
						
						<?php if($lazy){ ?>
                        onLazyRead: function(node){
                            node.appendAjax({
                                url: "<?php echo $this->href_to('objects_tree', $object); ?>",
                                data: {
                                    id: node.data.key
                                }
                            });
                        }
						<?php } ?>

                    });
					
					$(".cp_toolbar ul li.ml_langs a").on("click", function(){
						
						if($(this).hasClass('disable')){return;}
						
						$(".cp_toolbar ul li.ml_langs a").removeClass('active');
						
						$(this).addClass('active');
						
						var lang = $(this).attr('id') ? $(this).attr('id') : 'en';

						document.location.href = "/multilang/setlang/"+ lang;
						
					});
					
                });

            </script>

        </td>
        <td class="main" valign="top">
            <?php $this->renderGrid(false, $grid); ?>
        </td>
    </tr>
</table>
<?php } else { ?>

	<?php 
		$grid['options']['is_auto_init'] = true;
		$this->renderGrid($this->href_to('objects_ajax', $object), $grid);
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

				document.location.href = "/multilang/setlang/"+ lang;
				
			});
		});
	</script>
<?php } ?>
