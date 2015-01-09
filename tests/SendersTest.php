<?php

namespace SerwerSMS;

class SendersTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp() {
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testAdd() {
        $r = $this->serwersms->senders->add('NewSender');
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }

    public function testIndex() {
        $r = $this->serwersms->senders->index(array('personalized' => true));
        $this->assertObjectHasAttribute('items', $r);
    }
}