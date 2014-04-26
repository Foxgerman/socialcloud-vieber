<?php

namespace Vieber;

(new Page(function(App $app) {
	if ($app->request->get('val')) {
		$val = $app->request->get('val');
		$user_id = (new \App\User())->id();

		$stream_id = (new \App\Curl('stream/add'))->set([
			'user_id' => $user_id,
			'type' => 'stream',
			'content' => $val->text
		])->post();

		$stream = (new \App\Curl('stream/get'))->set([
			'user_id' => $user_id,
			'id' => $stream_id
		])->get();

		echo json_encode(array('permalink' => $stream->permalink, 'object' => trim(print_r($stream, true))));
		exit;
	}
}));