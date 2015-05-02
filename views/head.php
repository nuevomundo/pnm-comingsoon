<?php include('config.php'); ?>
<!doctype html>
<html>
  <head>
    <title><?php echo $pnm['config']['title']; ?><?php if (isset($page_id)) : ?> - <?php echo $pnm[$lang][$page_id][$page_id . '_title']; endif; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="<?php echo $pnm['config']['keywords']; ?>">
    <meta name="description" content="<?php echo $pnm['config']['description']; ?>">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- social -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $pnm['config']['title']; ?> - <?php echo $pnm[$lang][$page_id][$page_id . '_title']; ?>" />
    <meta property="og:description" content="<?php echo $pnm['config']['description']; ?>" />
    <meta property="og:url" content="http://projectnuevomundo.com<?php echo $page_url; ?>" />
    <meta property="og:image" content="http://projectnuevomundo.com/assets/img/social-thumb.jpg" />
    <meta property="og:site_name" content="<?php echo $pnm['config']['title']; ?>" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Lato:300,400' rel='stylesheet' type='text/css'>
    <link href="assets/css/plugins.min.css" rel="stylesheet">
    <link href="assets/css/app.min.css?v=0.2" rel="stylesheet" >
    <?php if($lang) { ?><script>var locale = "<?php echo $lang; ?>";</script><?php  } else { ?><script>var locale = "en";</script><?php } ?>
    </head>

  <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
    <script src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
  <![endif]-->