<?php

namespace SerwerSMS\SerwerSMS;

class Account {

    /**
     * @var mixed
     */
    private $master;

    public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Register new account
	 * 
	 * @param array $params
	 *      @option string "phone"
	 *      @option string "email"
	 *      @option string "first_name"
	 *      @option string "last_name"
	 *      @option string "company"
	 * @return object
	 *      @option bool "success"
	 */
	public function add($params = array()) {
		return $this->master->call('account/add', $params);
	}

	/**
	 * Return limits SMS
	 * @param array $params
     *      @option bool "show_type"
	 * @return object
	 *      @option array "items"
	 *          @option string "type" Type of message
	 *          @option string "chars_limit" The maximum length of message
	 *          @option string "value" Limit messages
	 * 
	 */
	public function limits($params = array()) {
		return $this->master->call('account/limits',$params);
	}

	/**
	 * Return contact details
	 * 
	 * @return object
	 *      @option string "telephone"
	 *      @option string "email"
	 *      @option string "form"
	 *      @option string "faq"
	 *      @option array "account_maintainer"
	 *          @option string "name"
	 *          @option string "email"
	 *          @option string "telephone"
	 *          @option string "photo"
	 */
	public function help() {
		return $this->master->call('account/help');
	}

	/**
	 * Return messages from the administrator
	 * 
	 * @return object
	 *      @option bool "new" Marking unread message
	 *      @option string "message" 
	 */
	public function messages() {
		return $this->master->call('account/messages');
	}
}
