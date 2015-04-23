<footer class="content-info">
	<div class="container">
		<div class="social">
			<ul>
				<li><a href="http://facebook.com/ProjectNuevoMundo"><img src="assets/img/icon-facebook.svg" alt=""></a></li>
				<li><a href="http://twitter.com/PrjctNuevoMundo"><img src="assets/img/icon-twitter.svg" alt=""></a></li>
				<li><a href="http://instagram.com/project_nuevo_mundo/"><img src="assets/img/icon-instagram.svg" alt=""></a></li>
				<li><a href="http://vimeo.com/projectnuevomundo"><img src="assets/img/icon-vimeo.svg" alt=""></a></li>
				<li><a href="http://www.linkedin.com/company/project-nuevo-mundo"><img src="assets/img/icon-linkedin.svg" alt=""></a></li>
			</ul>
		</div>
		<span class="copyright"><?php echo $pnm['config']['footer_comment']; ?></span>
	</div>
</footer>
<?php include('modal.php'); ?>

<script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
<script src='assets/js/plugins.min.js'></script>
<script src='assets/js/app.min.js'></script>
<?php if ($pnm["analytics"]): ?>
	<script>
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?php echo $pnm["analytics"] ?>']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
<?php endif ?>
