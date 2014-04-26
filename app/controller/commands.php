<?php

namespace Vieber;

(new Page(function(App $app) {
	$user = new \App\User();

	$app->api_call_users = print_r((new \App\Curl('user/get'))
		->set([
			'user_id' => $user->id()
		])
		->get(), true);

	$app->api_call_friends = print_r((new \App\Curl('connect/get'))
		->set([
			'user_id' => $user->id()
		])
		->get(), true);
}));