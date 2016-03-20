<?php 
	$langs = cmsCore::getLanguages();
	$titles = array(
		'ru' => 'Русский',
		'en' => 'English',
		'uk' => 'Українська',
	);
?>
<select id="userlang">
	<?php foreach($langs as $lang){ ?>
		<?php if($user_lang == $lang){$select = 'selected';} else {$select = '';} ?>
		<option value="<?php html($lang); ?>" <?php html($select); ?>><?php html($titles[$lang]); ?></option>
	<?php } ?>
</select>
<script>
	$("#userlang").change(function() {
		$("#userlang option:selected").each(function() {
			document.location.href = "/multilang/setlang/"+$(this).val();
		});
	});
</script>