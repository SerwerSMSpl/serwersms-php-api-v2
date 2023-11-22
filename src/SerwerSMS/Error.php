<?php

namespace SerwerSMS\SerwerSMS;

class Error {

    /**
     * @var mixed
     */
    private $master;

    public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Preview error
	 * 
	 * @param int $code
	 * @return object
	 *      @option int "code"
	 *      @option string "type"
	 *      @option string "message"
	 */
	public function view($code) {
		return $this->master->call('error/' . $code);
	}

}
