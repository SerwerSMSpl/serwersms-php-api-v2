<?php

namespace SerwerSMS;

class Phones {

	public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Checking phone in to HLR
	 * 
	 * @param string $phone
	 * @param string $id Query ID returned if the processing takes longer than 60 seconds
	 * @return object
	 *      @option string "phone"
	 *      @option string "status"
	 *      @option int "imsi"
	 *      @option string "network"
	 *      @option bool "ported"
	 *      @option string "network_ported"
	 */
	public function check($phone, $id = null) {
		$params = array('phone' => $phone, 'id' => $id);
		return $this->master->call('phones/check', $params);
	}

	/**
	 * Validating phone number
	 * 
	 * @param string $phone
	 * @return object
	 *      @option bool "correct"
	 */
	public function test($phone) {
		$params = array('phone' => $phone);
		return $this->master->call('phones/test', $params);
	}

}
