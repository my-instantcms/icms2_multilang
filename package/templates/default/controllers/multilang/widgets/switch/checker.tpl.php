<?php
	$max_items = 2; // указываем количество видимых языков

	$langs = cmsCore::getLanguages();
	unset($langs[array_search($user_lang, $langs)]);
	$ico = '/templates/default/controllers/multilang/flags/';

	$visible_items = $langs; // по умолчанию все языки видимы

	if ($max_items < sizeof($langs)){
		$visible_items = array_slice($langs, 0, $max_items, true);
		$more_items    = array_slice($langs, $max_items, sizeof($langs) - $max_items, true);
	}
?>
<style>.lang_switcher{position:relative;}.lang_switcher a{display:inline-block;margin:3px;background:#D7E6FD;padding:7px 5px 5px 5px;color:#444;font-size:13px;line-height:14px;cursor:pointer;text-align:center;text-transform:uppercase;width:40px;}.lang_switcher a:hover{background:#C5DCFF;box-shadow:0 3px 6px rgba(0, 0, 0, 0.176);}.lang_switcher a.switch_toogle{text-transform:lowercase;width:auto;}.lang_switcher_list{margin:10px 0 0;display:none;background-color:#fff;padding:5px;position:absolute;text-align:left;z-index:10;border-style:solid;max-width:200px;border-width:2px 1px 1px;box-shadow:0 6px 12px rgba(0, 0, 0, 0.176);border-color:#9ec1f7 rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15);}</style>
<div class="lang_switcher">

	<?php if ($visible_items){?>
		<?php foreach($visible_items as $l){ ?>
			<a class="switch" id="<?php html($l); ?>"><img src="<?php html($ico); ?><?php html($l); ?>.png"> <?php html($l); ?></a>
		<?php } ?>
	<?php } ?>

	<?php if (isset($more_items)){?>
		<a class="switch_toogle">
			<?php echo $max_items ? LANG_MENU_MORE : LANG_CP_SETTINGS_LANGUAGE; ?>
		</a>

		<div class="lang_switcher_list">
			<?php foreach($more_items as $l){ ?>
				<a class="switch" id="<?php html($l); ?>"><img src="<?php html($ico); ?><?php html($l); ?>.png"> <?php html($l); ?></a>
			<?php } ?>
		</div>
<?php } ?>
</div>
<script>
	$(".lang_switcher a.switch_toogle").on("click", function(){
		$('.lang_switcher_list').toggle();
	});

	$(".lang_switcher a.switch").on("click", function(){
		document.location.href = "/multilang/setlang/"+$(this).attr('id');
	});
</script>