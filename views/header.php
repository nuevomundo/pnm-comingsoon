<header>
  <nav class="navbar" role="navigation">
      <a class="navbar-brand navbar-left" href="index.php<?php if( isset($_GET['lang']) && $lang ) : echo "?lang=". $lang; endif; ?>" >
        <img src="assets/img/numundo-logo.svg" alt="NuMundo Logo">
      </a>

      <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse navbar-right">
        <ul class="nav navbar-nav">
          <!-- <li class="centers"><a href="#">Centers</a></li> -->
          <li class="about"><a href="about.php<?php if( isset($_GET['lang']) && $lang ) : echo "?lang=". $lang; endif; ?>"><?php echo $navi[$lang]['about']; ?></a></li>
          <li class="blog"><a href="http://numundo.org/blog" target="_blank"><?php echo $navi[$lang]['blog']; ?></a></li>
          <li class="list-btn">
              <a href="https://pnm.typeform.com/to/UHaXXV" target="_blank"><button class="btn" type="button"><?php echo $navi[$lang]['center']; ?></button></a>
          </li>
        </ul>
        <?php include('language-switcher.php') ?>
      </div>
  </nav>
</header>