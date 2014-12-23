<?php

namespace SerwerSMS;

class SubaccountsTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp() {
        $this->serwersms = new SerwerSMS("demo","demo");
    }
    
    public function testAdd() {
        $r = $this->serwersms->subaccounts->add('login','haslo',123,array('phone' => '500600700'));
        $this->assertArrayHasKey('error', $r);
        $this->assertEquals(4500, $r['error']['code']);
    }

    public function testIndex() {
        $r = $this->serwersms->subaccounts->index();
        $this->assertArrayHasKey('items', $r);
    }
    
    public function testView() {
        $r = $this->serwersms->subaccounts->view(123);
        $this->assertArrayHasKey('error', $r);
        $this->assertEquals(1004, $r['error']['code']);
    }

    public function testLimit() {
        $r = $this->serwersms->subaccounts->limit(123,'eco',200);
        $this->assertArrayHasKey('success', $r);
        $this->assertFalse($r['success']);
    }

    public function testDelete() {
        $r = $this->serwersms->subaccounts->delete(123);
        $this->assertArrayHasKey('success', $r);
        $this->assertFalse($r['success']);
    }
}