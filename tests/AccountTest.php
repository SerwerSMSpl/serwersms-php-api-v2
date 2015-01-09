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
        
        try{
            $r = $this->serwersms->account->add($params);
            $this->assertObjectHasAttribute('error', $r);
            $this->assertEquals(4312, $r->error->code);
        } catch(Exception $e){
            
        }
    }

    public function testLimits() {
        
        $r = $this->serwersms->account->limits();
        $this->assertObjectHasAttribute('items', $r);
        $this->assertEquals('eco', $r->items[0]->type);
    }

    public function testHelp() {

        $r = $this->serwersms->account->help();
        $this->assertObjectHasAttribute('telephone', $r);
    }

    public function testMessages() {
        
        $r = $this->serwersms->account->messages();
        $this->assertObjectHasAttribute('items', $r);
    }
}