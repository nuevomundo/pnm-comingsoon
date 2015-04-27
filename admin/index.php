<?php
  // $_SERVER['REMOTE_ADDR'] === '127.0.0.1' or die();
  // define relative path to JSON file and ensure
  // it has correct permissions before showing form

  define('JSON_FILE', '../content/content.json');
  if ( is_writable(JSON_FILE) ) {
    if ( isset($_POST) && !empty($_POST) ) {

     // convert form data to json format
      $postData = array(
        "config" => array (
            "title" => $_POST['title'],
            "keywords" => $_POST['keywords'],
            "description" => $_POST['description'],
            "analytics" => $_POST['analytics'],
            "footer_comment" => $_POST['footer_comment']
        ),
        "home" => array (
            "home_title" => $_POST['home_title'],
            "cta1" => $_POST['cta1'],
            "cta1_content" => $_POST['cta1_content'],
            "cta1_btn" => $_POST['cta1_btn'],
            "cta2" => $_POST['cta2'],
            "cta3" => $_POST['cta3'],
            "cta3_content" => $_POST['cta3_content'],
            "cta4" => $_POST['cta4'],
            "cta4_content" => $_POST['cta4_content'],
            "cta5" => $_POST['cta5'],
            "cta5_content" => $_POST['cta5_content'],
            "cta5_btn" => $_POST['cta5_btn'],
            "cta6" => $_POST['cta6'],
            "feature_title_1" => $_POST['feature_title_1'],
            "feature_text_1" => $_POST['feature_text_1'],
            "feature_btn_1" => $_POST['feature_btn_1'],
            "feature_title_2" => $_POST['feature_title_2'],
            "feature_text_2" => $_POST['feature_text_2'],
            "feature_btn_2" => $_POST['feature_btn_2'],
            "subscribe_title" => $_POST['subscribe_title'],
            "subscribe_intro" => $_POST['subscribe_intro'],
            "blog_title" => $_POST['blog_title'],
            "press_title" => $_POST['press_title'],
        ),
        "about" => array (
            "about_title" => $_POST['about_title'],
            "intro_title" => $_POST['intro_title'],
            "intro_text" => $_POST['intro_text'],
            "story_title" => $_POST['story_title'],
            "story_text" => $_POST['story_text'],
            "team_title" => $_POST['team_title'],
            "team_text" => $_POST['team_text'],
            "impact_title" => $_POST['impact_title'],
            "impact_intro" => $_POST['impact_intro'],
            "criteria_title" => $_POST['criteria_title'],
            "contact_title" => $_POST['contact_title'],
            "contact_intro" => $_POST['contact_intro'],
            "partner_title" => $_POST['partner_title']
        )
      );

      $write = file_put_contents(JSON_FILE, json_encode($postData, JSON_PRETTY_PRINT));
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
      body {
        background: #efefef;
      }
      .container {
        margin-bottom: 50px;
        max-width: 980px;
      }
      .save-btn {
        min-width: 120px;
        background: #32bfc1;
        border-color: #32bfc1;
      }
      .save-btn:hover {
        background:#1b7876;
        border-color: #1b7876;
      }
      .tab-content {
        margin-top: 20px;
      }
      .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        background-color: #e8e8e8;
      }
      ul.nav.nav-tabs a {
        color: #1a1a1a;
      }
      footer {margin-top: 40px; padding: 40px 0 10px 0;}
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
              <li role="presentation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About Page</a></li>
            </ul>

            <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="basic">
              <fieldset>

                <h2>Basic Configuration</h2>

                  <div class="form-group">
                    <label for="title">Page title</label>
                    <input class="form-control" type="text" name="title" placeholder="Welcome to Project Nuevo Mundo" value="<?php echo $pnm['config']['title']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input class="form-control" type="text" name="keywords" placeholder="Ecological, Project Nuevo Mundo, Impact Centres" value ="<?php echo $pnm['config']['keywords']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" name="description" placeholder="Lorem Ipsum Dolor..." value ="<?php echo $pnm['config']['description']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="analytics">Analytics ID</label>
                    <input class="form-control" type="text" name="analytics" placeholder="UA-XXXXXX-X" value ="<?php echo $pnm['config']['analytics']; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="footer_comment">Copyright</label>
                    <input class="form-control" type="text" name="footer_comment" placeholder="Copyright 2015 by..." value ="<?php echo $pnm['config']['footer_comment']; ?>" />
                  </div>

              </fieldset>
              </div>

              <div role="tabpanel" class="tab-pane" id="home">
              <fieldset>

                <h2>Landing Page Content</h2>
                <div class="form-group">
                    <label for="home_title">Page Title</label>
                    <input class="form-control" type="text" name="home_title" placeholder="" value="<?php echo $pnm['home']['home_title']; ?>" required/>
                </div>

                <hr>

                <div class="form-group">
                    <label for="cta1">Call to action 1</label>
                    <input class="form-control" type="text" name="cta1" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['home']['cta1']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta1_content">Call to action 1 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta1_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['home']['cta1_content']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="cta1_btn">Call to action 1 button</label>
                    <input class="form-control" type="text" name="cta1_btn" placeholder="Find Centers »" value="<?php echo $pnm['home']['cta1_btn']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="cta2">Call to action 2</label>
                    <input class="form-control" type="text" name="cta2" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['home']['cta2']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="cta3">Call to action 3</label>
                    <input class="form-control" type="text" name="cta3" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['home']['cta3']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta3_content">Call to action 3 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta3_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['home']['cta3_content']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="cta4">Call to action 4</label>
                    <input class="form-control" type="text" name="cta4" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['home']['cta4']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta4_content">Call to action 4 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta4_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['home']['cta4_content']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="cta5">Call to action 5</label>
                    <input class="form-control" type="text" name="cta5" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['home']['cta5']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="cta5_content">Call to action 5 content</label>
                    <textarea class="form-control" rows="3" type="text" name="cta5_content" placeholder="Find the perfect match for your interests..." required><?php echo $pnm['home']['cta5_content']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="cta5_btn">Call to action 5 button</label>
                    <input class="form-control" type="text" name="cta5_btn" placeholder="Contact us" value="<?php echo $pnm['home']['cta5_btn']; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="cta6">Call to action 6</label>
                    <input class="form-control" type="text" name="cta6" placeholder="Discover transformational travel experiences around the world." value="<?php echo $pnm['home']['cta6']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_title_1">Feature Title Left</label>
                    <input class="form-control" type="text" name="feature_title_1" placeholder="" value="<?php echo $pnm['home']['feature_title_1']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_text_1">Feature Content Left</label>
                    <textarea class="form-control" rows="3" type="text" name="feature_text_1" required><?php echo $pnm['home']['feature_text_1']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="feature_btn_1">Feature Button Left</label>
                    <input class="form-control" type="text" name="feature_btn_1" placeholder="" value="<?php echo $pnm['home']['feature_btn_1']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_title_2">Feature Title Right</label>
                    <input class="form-control" type="text" name="feature_title_2" placeholder="" value="<?php echo $pnm['home']['feature_title_2']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="feature_text_2">Feature Content Right</label>
                    <textarea class="form-control" rows="3" type="text" name="feature_text_2" required><?php echo $pnm['home']['feature_text_2']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="feature_btn_2">Feature Button Right</label>
                    <input class="form-control" type="text" name="feature_btn_2" placeholder="" value="<?php echo $pnm['home']['feature_btn_2']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="subscribe_title">Subscribe Title </label>
                    <input class="form-control" type="text" name="subscribe_title" placeholder="" value="<?php echo $pnm['home']['subscribe_title']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="subscribe_intro">Subscribe Intro</label>
                    <textarea class="form-control" rows="3" type="text" name="subscribe_intro" required><?php echo $pnm['home']['subscribe_intro']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="blog_title">Blog Title </label>
                    <input class="form-control" type="text" name="blog_title" placeholder="" value="<?php echo $pnm['home']['blog_title']; ?>" required/>
                  </div>

                  <div class="form-group">
                    <label for="press_title">Press Title </label>
                    <input class="form-control" type="text" name="press_title" placeholder="" value="<?php echo $pnm['home']['press_title']; ?>" required/>
                  </div>
              </fieldset>
              </div>

              <div role="tabpanel" class="tab-pane" id="about">
              <fieldset>

                  <h2>About Page Content</h2>

                  <div class="form-group">
                      <label for="about_title">Page Title</label>
                      <input class="form-control" type="text" name="about_title" placeholder="" value="<?php echo $pnm['about']['about_title']; ?>" required/>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label for="intro_title">Intro Title</label>
                      <input class="form-control" type="text" name="intro_title" placeholder="" value="<?php echo $pnm['about']['intro_title']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="intro_text">Intro Text</label>
                    <textarea class="form-control" rows="3" type="text" name="intro_text" placeholder="" required><?php echo $pnm['about']['intro_text']; ?></textarea>
                  </div>
                  <div class="form-group">
                      <label for="story_title">Story Title</label>
                      <input class="form-control" type="text" name="story_title" placeholder="" value="<?php echo $pnm['about']['story_title']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="story_text">Story Text</label>
                    <textarea class="form-control" rows="3" type="text" name="story_text" placeholder="" required><?php echo $pnm['about']['story_text']; ?></textarea>
                  </div>
                  <div class="form-group">
                      <label for="team_title">Team Title</label>
                      <input class="form-control" type="text" name="team_title" placeholder="" value="<?php echo $pnm['about']['team_title']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="team_text">Team Text</label>
                    <textarea class="form-control" rows="3" type="text" name="team_text" placeholder="" required><?php echo $pnm['about']['team_text']; ?></textarea>
                  </div>
                  <div class="form-group">
                      <label for="impact_title">Impact Title</label>
                      <input class="form-control" type="text" name="impact_title" placeholder="" value="<?php echo $pnm['about']['impact_title']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="impact_intro">Impact Text</label>
                    <textarea class="form-control" rows="3" type="text" name="impact_intro" placeholder="" required><?php echo $pnm['about']['impact_intro']; ?></textarea>
                  </div>
                  <div class="form-group">
                      <label for="criteria_title">Criteria Title</label>
                      <input class="form-control" type="text" name="criteria_title" placeholder="Our Partners." value="<?php echo $pnm['about']['criteria_title']; ?>" required/>
                  </div>
                  <div class="form-group">
                      <label for="contact_title">Contact Title</label>
                      <input class="form-control" type="text" name="contact_title" placeholder="" value="<?php echo $pnm['about']['contact_title']; ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="contact_intro">Contact Text</label>
                    <textarea class="form-control" rows="3" type="text" name="contact_intro" placeholder="" required><?php echo $pnm['about']['contact_intro']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="partner_title">Partner Title</label>
                    <input class="form-control" type="text" name="partner_title" placeholder="Our Partners." value="<?php echo $pnm['about']['partner_title']; ?>" required/>
                  </div>

              </fieldset>
              </div>

            </div>

            <hr>

            <button class="btn btn-lg btn-success save-btn" type="submit">Save</button>
            <button class="btn btn-lg btn-default" type="reset">Reset</button>

          </div>
          </form>

        </div>

      </div>

      <footer>
        :: very simple admin :: by <em><a href="https://twitter.com/goodthngs">@goodthngs</a></em>
      </footer>

    </div>
    <script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
    <script src="../assets/js/plugins.min.js"></script>
  </body>
</html>