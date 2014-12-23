<?php

namespace SerwerSMS;

class AccountTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }
    
    public function testAdd(){
        
        $params = array(
            'phone' => '+48500600700',
            'email' => 'mail@test.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => 'Hello World'
        );
        $r = $this->serwersms->account->add($params);
        $this->assertArrayHasKey('error', $r);
        $this->assertEquals(4312, $r['error']['code']);
    }

    public function testLimits() {
        
        $r = $this->serwersms->account->limits();
        $this->assertArrayHasKey('items', $r);
        $this->assertEquals('eco', $r['items'][0]['type']);
    }

    public function testHelp() {

        $r = $this->serwersms->account->help();
        $this->assertArrayHasKey('telephone', $r);
    }

    public function testMessages() {
        
        $r = $this->serwersms->account->messages();
        $this->assertArrayHasKey('items', $r);
    }
}