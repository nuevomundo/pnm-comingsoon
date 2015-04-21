<?php
error_reporting(0);
define('JSON_FILE', 'admin/comingsoon.json');
$pnm = json_decode( file_get_contents(JSON_FILE), true ); 
?>
<!doctype html>
<html>
  <head>
    <title><?php echo $pnm['title']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="<?php echo $pnm['keywords']; ?>">
    <meta name="description" content="<?php echo $pnm['description']; ?>">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Lato:300,400' rel='stylesheet' type='text/css'>
    <link href="assets/css/plugins.min.css" rel="stylesheet">
    <link href="assets/css/app.min.css" rel="stylesheet" >
  </head>

  <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
    <script src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
  <![endif]-->