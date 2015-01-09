<?php

namespace SerwerSMS;

class PaymentsTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testIndex() {
        $r = $this->serwersms->payments->index();
        $this->assertObjectHasAttribute('items', $r);
    }
    
    public function testView() {
        $list = $this->serwersms->payments->index();
        $r = $this->serwersms->payments->view($list->items[0]->id);
        $this->assertObjectHasAttribute('id', $r);
    }

}