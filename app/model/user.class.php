<?php

namespace App;

class User extends \Vieber\Model {
	private $_user;

	public function __construct() {
		parent::__construct();

		$this->_user = \Vieber\Engine::$custom['json']->user;
	}

	public function id() {
		return (isset($this->_user->user_id) ? (int) $this->_user->user_id : 0);
	}
}