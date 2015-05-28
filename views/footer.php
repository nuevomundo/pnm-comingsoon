<footer class="content-info">
	<div class="container">
		<div class="social">
			<ul>
				<li><a target="_blank" href="http://facebook.com/numundonow" title="Link to Facebook"><img src="assets/img/icon-facebook.svg" alt=""></a></li>
				<li><a target="_blank" href="http://twitter.com/nu_mundo" title="Link to Twitter"><img src="assets/img/icon-twitter.svg" alt=""></a></li>
				<li><a target="_blank" href="http://instagram.com/nu_mundo/" title="Link to Instagram"><img src="assets/img/icon-instagram.svg" alt=""></a></li>
				<li><a target="_blank" href="http://vimeo.com/numundo" title="Link to Vimeo"><img src="assets/img/icon-vimeo.svg" alt=""></a></li>
			</ul>
		</div>
		<span class="copyright"><?php echo $pnm['config']['footer_comment']; ?></span>
	</div>
</footer>
<?php //include('modal.php'); ?>

<script src='assets/js/jquery-1.11.2.min.js'></script>
<script src='assets/js/plugins.min.js'></script>
<script src='assets/js/app.min.js'></script>
<?php if ($pnm["config"]["analytics"]): ?>
	<script>
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?php echo $pnm["config"]["analytics"] ?>']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
<?php endif ?>
