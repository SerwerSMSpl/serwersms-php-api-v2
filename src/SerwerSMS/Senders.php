<?php

namespace SerwerSMS;

class Senders {

	public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Creating new Sender name
	 * 
	 * @param string $name
	 * @return array
	 *      @option bool "success"
	 */
	public function add($name) {
		$params = array('name' => $name);
		return $this->master->call('senders/add', $params);
	}

	/**
	 * Senders list
	 * 
	 * @param array $params
	 *      @option bool "predefined"
     *      @option string "sort" Values: name
     *      @option string "order" Values: asc|desc
	 * @return array
	 *      @option array "items"
	 *          @option string "name"
	 *          @option string "agreement" delivered|required|not_required
	 *          @option string "status" pending_authorization|authorized|rejected|deactivated
	 */
	public function index($params = array()) {
		return $this->master->call('senders/index', $params);
	}

}
