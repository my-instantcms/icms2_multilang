<?php 
	$langs = cmsCore::getLanguages();
	$ico = '/templates/default/controllers/multilang/flags/';
?>
<style>.userlang_swither{position:relative;display:block}.userlang_swither .userlang_swither-toggle{background:#D7E6FD;padding:5px;color:#444;font-size:13px;line-height:14px;cursor:pointer;text-transform:uppercase;}.userlang_swither .userlang_swither-toggle:hover{background:#C5DCFF}.userlang_swither .userlang_swither-toggle img{margin-bottom:-1px}.userlang_swither .userlang_swither-list{position:absolute;top:100%;left:0;z-index:2;display:none;float:left;min-width:46px;padding:0;margin:12px 0 0;list-style:none;font-size:13px;text-align:left;background-color:#fff;border:1px solid #ccc;border:1px solid rgba(0,0,0,.15);-webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);box-shadow:0 6px 12px rgba(0,0,0,.175);background-clip:padding-box;border-top:2px solid #9EC1F7}.userlang_swither .userlang_swither-list:after{content:"";position:absolute;width:0;height:0;border-color:transparent transparent #9EC1F7;border-style:solid;right:13px;bottom:100%;border-width:0 10px 10px}.userlang_swither .userlang_swither-list li{line-height:14px}.userlang_swither .userlang_swither-list li a{display:block;padding:5px;text-decoration:none;color:#444;text-transform:uppercase;cursor:pointer}.userlang_swither .userlang_swither-list li a:hover{background:#DAE9FF}.userlang_swither .userlang_swither-list li img{margin-bottom:-1px}</style>
<div class="userlang_swither">
	<a class="userlang_swither-toggle" onClick="langlist_toggle()">
		<img src="<?php html($ico); ?><?php html($user_lang); ?>.png"> <?php html($user_lang); ?>
	</a>
	<ul class="userlang_swither-list">
		<?php foreach($langs as $l){ ?>
			<?php if($user_lang == $l){continue;} ?>		
			<li><a id="<?php html($l); ?>"><img src="<?php html($ico); ?><?php html($l); ?>.png"> <?php html($l); ?></a></li>
		<?php } ?>
	</ul>
</div>
<script>
	function langlist_toggle(){
		$('.userlang_swither-list').toggle();
	}
	$(".userlang_swither .userlang_swither-list li a").on("click", function(){
		document.location.href = "/multilang/setlang/"+$(this).attr('id');
	});
</script>