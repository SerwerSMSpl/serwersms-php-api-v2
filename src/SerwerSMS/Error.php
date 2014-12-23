<?php

namespace SerwerSMS;

class Error {

	public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Preview error
	 * 
	 * @param int $code
	 * @return array
	 *      @option int "code"
	 *      @option string "type"
	 *      @option string "message"
	 */
	public function view($code) {
		return $this->master->call('error/' . $code);
	}

}
