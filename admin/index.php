<?php
  // $_SERVER['REMOTE_ADDR'] === '127.0.0.1' or die();
  // define relative path to JSON file and ensure
  // it has correct permissions before showing form

  define('JSON_FILE', 'comingsoon.json');
  if ( is_writable(JSON_FILE) ) {
    if ( isset($_POST) && !empty($_POST) ) {
      $write = file_put_contents(JSON_FILE, json_encode($_POST, JSON_PRETTY_PRINT));
      if ($write) {

        $status['exit'] = 0;
        $status['message'] = 'JSON file successfully updated.';

      } else {

        $status['exit'] = 2;
        $status['message'] = 'There was an error updating the JSON file.';

      }
    }
  } else {
    $status['exit'] = 1;
    $status['message'] = 'There was an error reading the JSON file.';
  }
  $pnm = json_decode( file_get_contents(JSON_FILE), true );

?><!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PNM Admin</title>
    <link rel="stylesheet" href="css/foundation.min.css" />
    <script src="js/modernizr.js"></script>
  </head>
  <body>
    <div class="row" style="margin-top: 1em;">
      <div class="large-12 columns">
        <?php if ( isset($status) ): ?>
        <div data-alert class="alert-box<?= $status['exit'] ? ' alert' : '' ?>">
          <?= $status['message'] ?>
          <a href="#" class="close">&times;</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <img src="../assets/img/pnm-logo-wide.svg" style="padding: 20px; max-width: 360px;" alt="Project Nuevo Mundo Logo" />
      <div class="large-12 columns">
        <div class="row">
        <form id="locator-form" action="index.php" method="post">
          <fieldset>
            <legend>Basic Configuration</legend>

            <div class="row">
              <div class="large-12 columns">
                <label for="title">Page title</label>
                <input type="text" name="title" placeholder="Welcome to Project Nuevo Mundo" value="<?php echo $pnm['title']; ?>" required/>
              </div>
              <div class="large-12 columns">
                <label for="keywords">Keywords</label>
                <input type="text" name="keywords" placeholder="Ecological, Project Nuevo Mundo, Impact Centres" value ="<?php echo $pnm['keywords']; ?>" required/>
              </div>
              <div class="large-12 columns">
                <label for="description">Description</label>
                <input type="text" name="description" placeholder="Lorem Ipsum Dolor..." value ="<?php echo $pnm['description']; ?>" required/>
              </div>
              <div class="large-12 columns">
                <label for="analytics">Analytics ID</label>
                <input type="text" name="analytics" placeholder="UA-XXXXXX-X" value ="<?php echo $pnm['analytics']; ?>" />
              </div>
            </div>

          </fieldset>

           <fieldset>
            <legend>Landing Page Content</legend>

            <div class="row">
              <div class="large-12 columns">
                <label for="cta1">Call to action 1</label>
                <input type="text" name="cta1" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta1']; ?>" required/>
              </div>
              <div class="large-12 columns">
                <label for="cta1_content">Call to action 1 content</label>
                <textarea type="text" name="cta1_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta1_content']; ?></textarea>
              </div>
              <div class="large-12 columns">
                <label for="cta1_btn">Call to action 1 button</label>
                <input type="text" name="cta1_btn" placeholder="Find Centers »" value="<?php echo $pnm['cta1_btn']; ?>" required/>
              </div>

              <div class="large-12 columns">
                <label for="cta2">Call to action 2</label>
                <input type="text" name="cta2" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta2']; ?>" required/>
              </div>

              <div class="large-12 columns">
                <label for="cta3">Call to action 3</label>
                <input type="text" name="cta3" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta3']; ?>" required/>
              </div>
              <div class="large-12 columns">
                <label for="cta3_content">Call to action 3 content</label>
                <textarea type="text" name="cta3_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta3_content']; ?></textarea>
              </div>

              <div class="large-12 columns">
                <label for="cta4">Call to action 4</label>
                <input type="text" name="cta4" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta4']; ?>" required/>
              </div>
              <div class="large-12 columns">
                <label for="cta4_content">Call to action 4 content</label>
                <textarea type="text" name="cta4_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta4_content']; ?></textarea>
              </div>

              <div class="large-12 columns">
                <label for="cta5">Call to action 5</label>
                <input type="text" name="cta5" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta5']; ?>" required/>
              </div>
              <div class="large-12 columns">
                <label for="cta5_content">Call to action 5 content</label>
                <textarea type="text" name="cta5_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta5_content']; ?></textarea>
              </div>
              <div class="large-12 columns">
                <label for="cta5_btn">Call to action 5 button</label>
                <input type="text" name="cta5_btn" placeholder="Contact us" value="<?php echo $pnm['cta5_btn']; ?>" required>
              </div>

              <div class="large-12 columns">
                <label for="cta6">Call to action 6</label>
                <input type="text" name="cta6" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta6']; ?>" required/>
              </div>

            </div>

          </fieldset>

          <div class="row text-right">
            <div class="large-12 columns">
              <input class="button secondary small" type="reset">
              <input class="button success small" type="submit" value="Save">
            </div>
          </div>
			</form>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
  </body>
</html>