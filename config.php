<?php
//error_reporting(0);

// wordpress path
$blog_path = '../pnm-blog/wp-blog-header.php';

// json path
define('ADMIN_JSON', 'content/content.json');
define('TEAM_JSON', 'content/team.json');
define('CRITERIA_JSON', 'content/center-criteria.json');
define('FORM_JSON', 'content/forms.json');

// get content
$pnm 		= json_decode( file_get_contents(ADMIN_JSON), true );
$team 		= json_decode( file_get_contents(TEAM_JSON), true );
$criteria 	= json_decode( file_get_contents(CRITERIA_JSON), true );
$forms 		= json_decode( file_get_contents(FORM_JSON), true );
 ?>