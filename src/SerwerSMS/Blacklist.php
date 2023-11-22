<?php

namespace SerwerSMS\SerwerSMS;

class Blacklist {

    /**
     * @var mixed
     */
    private $master;

    public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Add phone to the blacklist
	 * 
	 * @param string $phone
	 * @return object
	 *      @option bool "success"
	 *      @option int "id"
	 */
	public function add($phone) {
		$params = array('phone' => $phone);
		return $this->master->call('blacklist/add', $params);
	}

	/**
	 * List of blacklist phones
	 * 
	 * @param string $phone
	 * @param array $params
	 *      @option int "page" The number of the displayed page
	 *      @option int "limit" Limit items are displayed on the single page
	 * @return object
	 *      @option array "paging"
	 *          @option int "page" The number of current page
	 *          @option int "count" The number of all pages
	 *      @option array "items"
	 *          @option string "phone"
	 *          @option string "added" Date of adding phone
	 */
	public function index($phone = null, $params = array()) {
		$params = array_merge(array('phone' => $phone), $params);
		return $this->master->call('blacklist/index', $params);
	}

	/**
	 * Checking if phone is blacklisted
	 * 
	 * @param string $phone
	 * @return object
	 *      @option bool "exists"
	 */
	public function check($phone) {
		$params = array('phone' => $phone);
		return $this->master->call('blacklist/check', $params);
	}

	/**
	 * Deleting phone from the blacklist
	 * 
	 * @param string $phone
	 * @return object
	 *      @option bool "success"
	 */
	public function delete($phone) {
		$params = array('phone' => $phone);
		return $this->master->call('blacklist/delete', $params);
	}

}
