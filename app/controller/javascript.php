<?php

namespace Vieber;

(new Page(function(App $app) {
	if ($app->request->get('is_ajax')) {
		echo "Thanks for clicking!\n-----------\n\n";
		print_r($app->request->get());
		exit;
	}
}));