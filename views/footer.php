<script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
<script src='//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js'></script>
<script src='assets/js/jquery.tagsinput.min.js'></script>
<script src='assets/js/app.js'></script>
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