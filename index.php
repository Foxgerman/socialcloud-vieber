<?php

error_reporting(E_ALL);

define('THIS_DIR', dirname(__FILE__));

if (!file_exists(THIS_DIR . '/config.php')) {
	exit('Rename config.php.new to config.php');
}

require(THIS_DIR . '/config.php');
require(VIEBER_BOOT);

if (!isset($_REQUEST['json'])) {
	exit('Not a valid Moxi9 call.');
}

$json = json_decode($_REQUEST['json']);

$parts = explode('/', $json->url);
$home_url = $parts[0];

unset($parts[0]);
Vieber\Engine::page(implode('/', $parts));

if (!empty($json->post)) {
	$_POST = (array) $json->post;
}

if (!empty($json->get)) {
	$_GET = (array) $json->get;
}

Vieber\Engine::start([
	'app_path' => THIS_DIR . '/app/',
	'theme_path' => THIS_DIR . '/theme/',
	'jscript_path' => THIS_DIR . '/jscript/',
	'static_path' => THIS_DIR . '/static/',
	'dev_mode' => true,

	'custom' => [
		'home' => $home_url,
		'json' => $json
	],

	'events' => [
		'onload' => function(Vieber\App $app) {
			$app->home = Vieber\Engine::$custom['home'];
		}
	]
]);

?>