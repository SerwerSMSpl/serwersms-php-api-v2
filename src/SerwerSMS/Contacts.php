<?php

namespace SerwerSMS\SerwerSMS;

class Contacts {

    /**
     * @var mixed
     */
    private $master;

    public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Add new contact
	 * 
	 * @param int|array $group_id
	 * @param string $phone
	 * @param array $params
	 *      @option string "email"
	 *      @option string "first_name"
	 *      @option string "last_name"
	 *      @option string "company"
	 *      @option string "tax_id"
	 *      @option string "address"
	 *      @option string "city"
	 *      @option string "description"
	 * @return object
	 *      @option bool "success"
	 *      @option int "id"
	 */
	public function add($group_id, $phone, $params = array()) {
		$params = array_merge(array(
			'group_id' => $group_id,
			'phone' => $phone,
				), $params);
		return $this->master->call('contacts/add', $params);
	}

	/**
	 * List of contacts
	 * 
	 * @param int $group_id
	 * @param string $search
	 * @param array $params
	 *      @option int "page" The number of the displayed page
	 *      @option int "limit" Limit items are displayed on the single page
     *      @option string "sort" Values: first_name|last_name|phone|company|tax_id|email|address|city|description
     *      @option string "order" Values: asc|desc
	 * @return object
	 *      @option array "paging"
	 *          @option int "page" The number of current page
	 *          @option int "count" The number of all pages
	 *      @options array "items"
	 *          @option int "id"
	 *          @option string "phone"
	 *          @option string "email"
	 *          @option string "company"
	 *          @option string "first_name"
	 *          @option string "last_name"
	 *          @option string "tax_id"
	 *          @option string "address"
	 *          @option string "city"
	 *          @option string "description"
	 *          @option bool "blacklist"
	 *          @option int "group_id"
	 *          @option string "group_name"
	 */
	public function index($group_id = null, $search = null, $params = array()) {
		$params = array_merge(array(
			'group_id' => $group_id,
			'search' => $search
				), $params);
		return $this->master->call('contacts/index', $params);
	}

	/**
	 * View single contact
	 * 
	 * @param int $id
	 * @return object
	 *      @option integer "id"
	 *      @option string "phone"
	 *      @option string "email"
	 *      @option string "company"
	 *      @option string "first_name"
	 *      @option string "last_name"
	 *      @option string "tax_id"
	 *      @option string "address"
	 *      @option string "city"
	 *      @option string "description"
	 *      @option bool "blacklist"
	 */
	public function view($id) {
		$params = array('id' => $id);
		return $this->master->call('contacts/view', $params);
	}

	/**
	 * Editing a contact
	 * 
	 * @param int $id
	 * @param int|array $group_id
	 * @param string $phone
	 * @param array $params
	 *      @option string "email"
	 *      @option string "first_name"
	 *      @option string "last_name"
	 *      @option string "company"
	 *      @option string "tax_id"
	 *      @option string "address"
	 *      @option string "city"
	 *      @option string "description"
	 * @return object
	 *      @option bool "success"
	 *      @option int "id"
	 */
	public function edit($id, $group_id, $phone, $params = array()) {
		$params = array_merge(array(
			'id' => $id,
			'group_id' => $group_id,
			'phone' => $phone
				), $params);
		return $this->master->call('contacts/edit', $params);
	}

	/**
	 * Deleting a phone from contacts
	 * 
	 * @param int $id
	 * @return object
	 *      @option bool "success"
	 */
	public function delete($id) {
		$params = array('id' => $id);
		return $this->master->call('contacts/delete', $params);
	}

	/**
	 * Import contact list
	 * 
	 * @param string $group_name
	 * @param array $contact[]
	 *      @option string "phone"
	 *      @option string "email"
	 *      @option string "first_name"
	 *      @option string "last_name"
	 *      @option string "company"
	 * @return object
	 *      @option bool "success"
	 *      @option int "id"
	 *      @option int "correct" Number of contacts imported correctly
	 *      @option int "failed" Number of errors
	 */
	public function import($group_name, $contact) {
		$params = array(
			'group_name' => $group_name,
			'contact' => $contact
		);
		return $this->master->call('contacts/import', $params);
	}

}
