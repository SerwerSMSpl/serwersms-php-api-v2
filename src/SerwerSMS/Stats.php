<?php

namespace SerwerSMS\SerwerSMS;

class Stats {

	public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Statistics an sending
	 * 
	 * @param array $params
	 *      @option string "type" eco|full|voice|mms
	 *      @option string "begin" Start date
	 *      @option string "end" End date
	 * @return object
	 *      @option object "items"
	 *          @option int "id"
	 *          @option string "name"
	 *          @option int "delivered"
	 *          @option int "pending"
	 *          @option int "undelivered"
	 *          @option int "unsent"
	 *          @option string "begin"
	 *          @option string "end"
	 *          @option string "text"
	 *          @option string "type" eco|full|voice|mms
	 */
	public function index($params = array()) {
		return $this->master->call('stats/index', $params);
	}

}
