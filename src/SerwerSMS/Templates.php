<?php

namespace SerwerSMS;

class Templates {

	public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * List of templates
	 * @param array $params
     *      @option string "sort" Values: name
     *      @option string "order" Values: asc|desc
	 * @return array
	 *      @option array "items"
	 *          @option int "id"
	 *          @option string "name"
	 *          @option string "text"
	 */
	public function index($params = array()) {
		return $this->master->call('templates/index',$params);
	}

	/**
	 * Adding new template
	 * 
	 * @param string $name
	 * @param string $text
	 * @return array
	 *      @option array
	 *          @option bool "success"
	 *          @option int "id"
	 */
	public function add($name, $text) {
		$params = array(
			'name' => $name,
			'text' => $text
		);
		return $this->master->call('templates/add', $params);
	}

	/**
	 * Editing a template
	 * 
	 * @param int $id
	 * @param string $name
	 * @param string $text
	 * @return array
	 *      @option bool "success"
	 *      @option int "id"
	 */
	public function edit($id, $name, $text) {
		$params = array(
			'id' => $id,
			'name' => $name,
			'text' => $text
		);
		return $this->master->call('templates/edit', $params);
	}

	/**
	 * Deleting a template
	 * 
	 * @param int $id
	 * @return array
	 *      @option bool "success"
	 */
	public function delete($id) {
		$params = array('id' => $id);
		return $this->master->call('templates/delete', $params);
	}

}
