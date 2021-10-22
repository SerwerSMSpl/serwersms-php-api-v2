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

	public $username;

	public $password;

	public $api_url = 'https://api2.serwersms.pl';

	public $format = 'json';

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

	public function __construct($username, $password) {

		if (!$username) {
			throw new Exception('Username is empty');
		}

		if (!$password) {
			throw new Exception('Password is empty');
		}

		$this->username = $username;
		$this->password = $password;

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

		$params['username'] = $this->username;
		$params['password'] = $this->password;
        $params['system'] = 'client_php';

		$curl = curl_init($this->api_url . '/' . $url . '.' . $this->format);

		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		$answer = curl_exec($curl);

		if (curl_errno($curl)) {
			throw new Exception('Failed call: ' . curl_error($curl), curl_errno($curl));
		}
        
        $http_code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        if($http_code != 200){
            throw new Exception('Unexpected HTTP code', $http_code);
        }
        
		curl_close($curl);

		if ($this->format == 'xml') {
            $result = simplexml_load_string($answer);
            if(isset($result->code) and isset($result->type) and isset($result->message)){
                throw new Exception($result->message,(int) $result->code);
            }
        } else {
            $result = json_decode($answer);
            if(isset($result->error)){
                throw new Exception($result->error->message,(int) $result->error->code);
            }
        }
        return $result;
	}

}