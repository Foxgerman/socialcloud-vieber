<?php

namespace Vieber;

(new Page(function(App $app) {
	if ($app->request->get('foo')) {
		$app->foo = print_r((object) array_map('htmlspecialchars', (array) $app->request->get()), true);
	}

	if ($app->request->get('val')) {
		$app->post_val = print_r($app->request->get(), true);
	}
}));