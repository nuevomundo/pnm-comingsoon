<?php
//error_reporting(0);

// wordpress path
$blog_path = 'blog/wp-blog-header.php';

// json path
DEFINE('BASE_URL', __DIR__ . '/');
define('ADMIN_JSON', 'content/content.json');
define('TEAM_JSON', 'content/team.json');
define('CRITERIA_JSON', 'content/center-criteria.json');
define('FORM_JSON', 'content/forms.json');
define('MENU_JSON', 'content/menu.json');

// get content
$pnm 		= json_decode( file_get_contents(BASE_URL . ADMIN_JSON), true );
$team 		= json_decode( file_get_contents(BASE_URL . TEAM_JSON), true );
$criteria 	= json_decode( file_get_contents(BASE_URL . CRITERIA_JSON), true );
$forms 		= json_decode( file_get_contents(BASE_URL . FORM_JSON), true );
$navi 		= json_decode( file_get_contents(BASE_URL . MENU_JSON), true );
?>