<?php

namespace SerwerSMS\SerwerSMS;

class Payments {

    /**
     * @var mixed
     */
    private $master;

    public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * List of payments
	 * 
	 * @return object
	 *      @option object "items"
	 *          @option int "id"
	 *          @option string "number"
	 *          @option string "state" paid|not_paid
	 *          @option float "paid"
	 *          @option float "total"
	 *          @option string "payment_to"
	 *          @option string "url"
	 */
	public function index() {
		return $this->master->call('payments/index');
	}

	/**
	 * View single payment
	 * 
	 * @param int $id
	 * @return object
	 *      @option int "id"
	 *      @option string "number"
	 *      @option string "state" paid|not_paid
	 *      @option float "paid"
	 *      @option float "total"
	 *      @option string "payment_to"
	 *      @option string "url"
	 */
	public function view($id) {
		$params = array('id' => $id);
		return $this->master->call('payments/view', $params);
	}

	/**
	 * Download invoice as PDF
	 * 
	 * @param int $id
	 * @return resource
	 */
	public function invoice($id) {
		$params = array('id' => $id);
		return $this->master->call('payments/invoice', $params);
	}

}
