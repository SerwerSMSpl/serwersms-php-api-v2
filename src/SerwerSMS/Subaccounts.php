<?php

namespace SerwerSMS\SerwerSMS;

class Subaccounts {

	public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Creating new subaccount
	 * 
	 * @param string $subaccount_username
	 * @param string $subaccount_password
	 * @param int $subaccount_id Subaccount ID, which is template of powers
	 * @param object $params
	 *      @option string "name"
	 *      @option string "phone"
	 *      @option string "email"
	 * @return type
	 */
	public function add($subaccount_username, $subaccount_password, $subaccount_id, $params = array()) {
		$params = array_merge(array(
			'subaccount_username' => $subaccount_username,
			'subaccount_password' => $subaccount_password,
			'subaccount_id' => $subaccount_id
				), $params);
		return $this->master->call('subaccounts/add', $params);
	}

	/**
	 * List of subaccounts
	 * 
	 * @return array
	 *      @option object "items"
	 *          @option int "id"
	 *          @option string "username"
	 */
	public function index() {
		return $this->master->call('subaccounts/index');
	}

	/**
	 * View details of subaccount
	 * 
	 * @param int $id
	 * @return object
	 *      @option int "id"
	 *      @option string "username"
	 *      @option string "name"
	 *      @option string "phone"
	 *      @option string "email"
	 */
	public function view($id) {
		$params = array('id' => $id);
		return $this->master->call('subaccounts/view', $params);
	}

	/**
	 * Setting the limit on subaccount
	 * 
	 * @param int $id
	 * @param string $type Message type: eco|full|voice|mms|hlr
	 * @param int $value
	 * @return object
	 *      @option bool "success"
	 *      @option int "id"
	 */
	public function limit($id, $type, $value) {
		$params = array(
			'id' => $id,
			'type' => $type,
			'value' => $value
		);
		return $this->master->call('subaccounts/limit', $params);
	}

	/**
	 * Deleting a subaccount
	 * 
	 * @param int $id
	 * @return object
	 *      @option bool "success"
	 */
	public function delete($id) {
		$params = array('id' => $id);
		return $this->master->call('subaccounts/delete', $params);
	}

}
