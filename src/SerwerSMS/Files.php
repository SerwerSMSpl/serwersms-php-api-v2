<?php

namespace SerwerSMS;

class Files {

	public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * Add new file
	 * 
	 * @param string $type - mms|voice
	 * @param array $params
	 *      @option string "url" URL address to file
	 *      @option resource "file" A file handler (only for MMS)
	 * @return array
	 *      @option bool "success"
	 *      @option string "id"
	 */
	public function add($type, $params) {
        $params = array_merge(array('type' => $type), $params);
		return $this->master->call('files/add', $params);
	}

	/**
	 * List of files
	 * 
	 * @param string $type - mms|voice
	 * @return array
	 *      @option array "items"
	 *          @option string "id"
	 *          @option string "name"
	 *          @option int "size"
	 *          @option string "type" - mms|voice
	 *          @option string "date"
	 */
	public function index($type) {
		$params = array('type' => $type);
		return $this->master->call('files/index', $params);
	}

	/**
	 * View file
	 * 
	 * @param string $id
	 * @param string $type - mms|voice
	 * @return array
	 *      @option string "id"
	 *      @option string "name"
	 *      @option int "size"
	 *      @option string "type" - mms|voice
	 *      @option string "date"
	 */
	public function view($id, $type) {
		$params = array(
			'id' => $id,
			'type' => $type
		);
		return $this->master->call('files/view', $params);
	}

	/**
	 * Deleting a file
	 * 
	 * @param string $id
	 * @param string $type - mms|voice
	 * @return array
	 *      @option bool "success"
	 */
	public function delete($id, $type) {
		$params = array(
			'id' => $id,
			'type' => $type
		);
		return $this->master->call('files/delete', $params);
	}

}
