<?php

namespace SerwerSMS\SerwerSMS;

class Groups {

    /**
     * @var mixed
     */
    private $master;

    public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Add new group
	 * 
	 * @param string $name
	 * @return object
	 *      @option bool "success"
	 *      @option int "id"
	 */
	public function add($name) {
		$params = array('name' => $name);
		return $this->master->call('groups/add', $params);
	}

	/**
	 * List of group
	 * 
	 * @param string $search Group name
	 * @param array $params
	 *      @option int "page" The number of the displayed page
	 *      @option int "limit" Limit items are displayed on the single page
     *      @option string "sort" Values: name
     *      @option string "order" Values: asc|desc
	 * @return object
	 *      @option array "paging"
	 *          @option int "page" The number of current page
	 *          @option int "count" The number of all pages
	 *      @option array "items"
	 *          @option int "id"
	 *          @option string "name"
	 *          @option int "count" Number of contacts in the group
	 */
	public function index($search = null, $params = array()) {
		$params = array_merge(array('search' => $search), $params);
		return $this->master->call('groups/index', $params);
	}

	/**
	 * View single group
	 * 
	 * @param int $id
	 * @return object
	 *      @option int "id"
	 *      @option string "name"
	 *      @option int "count" Number of contacts in the group
	 */
	public function view($id) {
		$params = array('id' => $id);
		return $this->master->call('groups/view', $params);
	}

	/**
	 * Editing a group
	 * 
	 * @param int $id
	 * @param string $name
	 * @return object
	 *      @option bool "success"
	 *      @option int "id"
	 */
	public function edit($id, $name) {
		$params = array(
			'id' => $id,
			'name' => $name
		);
		return $this->master->call('groups/edit', $params);
	}

	/**
	 * Deleting a group
	 * 
	 * @param int $id
	 * @return object
	 *      @option bool "success"
	 */
	public function delete($id) {
		$params = array('id' => $id);
		return $this->master->call('groups/delete', $params);
	}

	/**
	 * Viewing a groups containing phone
	 * 
	 * @param string $phone
	 * @return object
	 *      @option int "id"
	 *      @option int "group_id"
	 *      @option string "group_name"
	 */
	public function check($phone) {
		$params = array('phone' => $phone);
		return $this->master->call('groups/check', $params);
	}

}
