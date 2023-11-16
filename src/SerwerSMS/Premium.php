<?php

namespace SerwerSMS\SerwerSMS;

class Premium {

    /**
     * @var mixed
     */
    private $master;

    public function __construct($master) {
		$this->master = $master;
	}

	/**
	 * List of received SMS Premium
	 * 
	 * @return object
	 *      @option object "items"
	 *          @option int "id"
	 *          @option string "to_number" Premium number
	 *          @option string "from_number" Sender phone number
	 *          @option string "date"
	 *          @option int "limit" Limitation the number of responses
	 *          @option string "text" Message
	 */
	public function index() {
		return $this->master->call('premium/index');
	}

	/**
	 * Sending replies for received SMS Premium
	 * 
	 * @param string $phone
	 * @param string $text Message
	 * @param string $gate Premium number
	 * @param int $id ID received SMS Premium
	 * @return object
	 *      @option bool "success"
	 */
	public function send($phone, $text, $gate, $id) {
		$params = array(
			'phone' => $phone,
			'text' => $text,
			'gate' => $gate,
			'id' => $id
		);
		return $this->master->call('premium/send', $params);
	}

	/**
	 * View quiz results
	 * 
	 * @param int $id
	 * @return object
	 *      @option int "id"
	 *      @option string "name"
	 *      @option object "items"
	 *          @option int "id"
	 *          @option int "count" Number of response
	 */
	public function quiz($id) {
		return $this->master->call('quiz/view', array('id' => $id));
	}

}
