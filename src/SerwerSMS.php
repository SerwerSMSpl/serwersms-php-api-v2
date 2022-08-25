<?php

namespace SerwerSMS;

use SerwerSMS\SerwerSMS\Messages;
use SerwerSMS\SerwerSMS\Files;
use SerwerSMS\SerwerSMS\Premium;
use SerwerSMS\SerwerSMS\Account;
use SerwerSMS\SerwerSMS\Senders;
use SerwerSMS\SerwerSMS\Groups;
use SerwerSMS\SerwerSMS\Contacts;
use SerwerSMS\SerwerSMS\Phones;
use SerwerSMS\SerwerSMS\Subaccounts;
use SerwerSMS\SerwerSMS\Blacklist;
use SerwerSMS\SerwerSMS\Payments;
use SerwerSMS\SerwerSMS\Stats;
use SerwerSMS\SerwerSMS\Templates;
use SerwerSMS\SerwerSMS\Error;
use SerwerSMS\SerwerSMS\Exception;

class SerwerSMS {

	public $token;

	public $api_url = 'https://api2.serwersms.pl';

	public $messages;

	public $files;

	public $premium;

	public $account;

	public $senders;

	public $groups;

	public $contacts;

	public $phones;

	public $subaccounts;

	public $blacklist;

	public $payments;

	public $stats;

	public $tamplates;

	public $error;

	public function __construct($token) {

		if (!$token) {
			throw new Exception('Token is empty');
		}

		$this->token = $token;

		$this->messages = new Messages($this);
		$this->files = new Files($this);
		$this->premium = new Premium($this);
		$this->account = new Account($this);
		$this->senders = new Senders($this);
		$this->groups = new Groups($this);
		$this->contacts = new Contacts($this);
		$this->phones = new Phones($this);
		$this->subaccounts = new Subaccounts($this);
		$this->blacklist = new Blacklist($this);
		$this->payments = new Payments($this);
		$this->stats = new Stats($this);
		$this->templates = new Templates($this);
		$this->error = new Error($this);
	}

	public function call($url, $params = array()) {

        $params['system'] = 'client_php';

		$curl = curl_init($this->api_url . '/' . $url . '.json');
        $data_string = json_encode($params);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-type: application/json',
            'Content-Length: ' . strlen($data_string),
            'Authorization: Bearer '.$this->token
        ));
		$answer = curl_exec($curl);

		if (curl_errno($curl)) {
			throw new Exception('Failed call: ' . curl_error($curl), curl_errno($curl));
		}
        
        $http_code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        if($http_code != 200){
            throw new Exception('Unexpected HTTP code', $http_code);
        }
        
		curl_close($curl);

        $result = json_decode($answer);
        if(isset($result->error)){
            throw new Exception($result->error->message,(int) $result->error->code);
        }
        
        return $result;
	}

}