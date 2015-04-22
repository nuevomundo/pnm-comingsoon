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
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <script src="js/modernizr.js"></script>
    <style type="text/css" media="screen">
      .container {
        margin-bottom: 50px;
      }
      footer {padding: 20px 0;}
    </style>
  </head>
  <body>
    <div class="container">

      <div class="row" style="margin-top: 1em;">

        <div class="col-md-12">
          <?php if ( isset($status) ): ?>
          <div data-alert class="alert alert-<?= $status['exit'] ? 'danger' : 'success' ?>">
            <?= $status['message'] ?>
          </div>
          <?php endif; ?>
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
          <img src="../assets/img/pnm-logo-wide.svg" style="padding: 20px; max-width: 360px;" alt="Project Nuevo Mundo Logo" />
        </div>

        <div class="col-md-12">

          <form id="locator-form" action="index.php" method="post">
          <div role="tabpanel">
              <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Configuration</a></li>
              <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home Page</a></li>
            </ul>

            <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="basic">
              <fieldset>

                <h2>Basic Configuration</h2>

                  <div class="form-group">
                    <label for="title">Page title</label>
                    <input class="form-control" type="text" name="title" placeholder="Welcome to Project Nuevo Mundo" value="<?php echo $pnm['title']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input class="form-control" type="text" name="keywords" placeholder="Ecological, Project Nuevo Mundo, Impact Centres" value ="<?php echo $pnm['keywords']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" name="description" placeholder="Lorem Ipsum Dolor..." value ="<?php echo $pnm['description']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="analytics">Analytics ID</label>
                    <input class="form-control" type="text" name="analytics" placeholder="UA-XXXXXX-X" value ="<?php echo $pnm['analytics']; ?>" />
                  </div>

              </fieldset>
              </div>

              <div role="tabpanel" class="tab-pane" id="home">
              <fieldset>

                <h2>Landing Page Content</h2>

                <div class="form-group">
                    <label for="cta1">Call to action 1</label>
                    <input class="form-control" type="text" name="cta1" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta1']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta1_content">Call to action 1 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta1_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta1_content']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="cta1_btn">Call to action 1 button</label>
                    <input class="form-control" type="text" name="cta1_btn" placeholder="Find Centers »" value="<?php echo $pnm['cta1_btn']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="cta2">Call to action 2</label>
                    <input class="form-control" type="text" name="cta2" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta2']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="cta3">Call to action 3</label>
                    <input class="form-control" type="text" name="cta3" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta3']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta3_content">Call to action 3 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta3_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta3_content']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="cta4">Call to action 4</label>
                    <input class="form-control" type="text" name="cta4" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta4']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta4_content">Call to action 4 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta4_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta4_content']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="cta5">Call to action 5</label>
                    <input class="form-control" type="text" name="cta5" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta5']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta5_content">Call to action 5 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta5_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['cta5_content']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="cta5_btn">Call to action 5 button</label>
                    <input class="form-control" type="text" name="cta5_btn" placeholder="Contact us" value="<?php echo $pnm['cta5_btn']; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="cta6">Call to action 6</label>
                    <input class="form-control" type="text" name="cta6" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['cta6']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_title_1">Feature Title Left</label>
                    <input class="form-control" type="text" name="feature_title_1" placeholder="" value="<?php echo $pnm['feature_title_1']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_text_1">Feature Content Left</label>
                    <textarea class="form-control" rows="3" type="text" name="feature_text_1" required><?php echo $pnm['feature_text_1']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="feature_btn_1">Feature Button Left</label>
                    <input class="form-control" type="text" name="feature_btn_1" placeholder="" value="<?php echo $pnm['feature_btn_1']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_title_2">Feature Title Right</label>
                    <input class="form-control" type="text" name="feature_title_2" placeholder="" value="<?php echo $pnm['feature_title_2']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_text_2">Feature Content Right</label>
                    <textarea class="form-control" rows="3" type="text" name="feature_text_2" required><?php echo $pnm['feature_text_2']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="feature_btn_2">Feature Button Right</label>
                    <input class="form-control" type="text" name="feature_btn_2" placeholder="" value="<?php echo $pnm['feature_btn_2']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="subscribe_title">Subscribe Title </label>
                    <input class="form-control" type="text" name="subscribe_title" placeholder="" value="<?php echo $pnm['subscribe_title']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="subscribe_intro">Subscribe Intro</label>
                    <textarea class="form-control" rows="3" type="text" name="subscribe_intro" required><?php echo $pnm['subscribe_intro']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="blog_title">Blog Title </label>
                    <input class="form-control" type="text" name="blog_title" placeholder="" value="<?php echo $pnm['blog_title']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="press_title">Press Title </label>
                    <input class="form-control" type="text" name="press_title" placeholder="" value="<?php echo $pnm['press_title']; ?>" required/>
                  </div>
              </fieldset>
              </div>

            </div>

            <hr>

            <button class="btn btn-default" type="reset">Reset</button>
            <button class="btn btn-success" type="submit">Save</button>

          </div>
          </form>

        </div>

      </div>

      <footer>
        <em>Project Nuevo Mundo - Simple Admin &copy;2015</em>
      </footer>
    </div>
    <script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
    <script src="../assets/js/plugins.min.js"></script>
  </body>
</html>