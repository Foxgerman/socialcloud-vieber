<?php

namespace App;

class Curl {
	private $_curl;

	public function __construct($call) {
		$this->_curl = new \Vieber\Curl(MOXI9_API_URL . $call, 'json');
		$this->_curl->auth(MOXI9_PUBLIC_KEY, MOXI9_PRIVATE_KEY);
		$this->_curl->header([
			'MOXI9-CLIENT' => \Vieber\Engine::$custom['json']->client_api_id
		]);
	}

	public function __call($method, $args) {
		return call_user_func_array([$this->_curl, $method], $args);
	}
}