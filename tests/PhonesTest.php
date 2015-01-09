<?php

namespace SerwerSMS;

class PhonesTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testCheck() {
        $r = $this->serwersms->phones->check('500600700');
        $this->assertObjectHasAttribute('phone', $r);
    }

    public function testTest() {
        $r = $this->serwersms->phones->test('500600700');
        $this->assertObjectHasAttribute('correct', $r);
        $this->assertTrue($r->correct);
    }
}