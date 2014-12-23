<?php

namespace SerwerSMS;

class PremiumTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testIndex() {

        $r = $this->serwersms->premium->index();
        $this->assertArrayHasKey('items', $r);
    }

    public function testSend() {
        $r = $this->serwersms->premium->send('500600700', 'Wiadomosc', 71200, 123456);
        $this->assertArrayHasKey('error', $r);
        $this->assertEquals(4201, $r['error']['code']);
    }

    public function testQuiz() {
        $r = $this->serwersms->premium->quiz(123);
        $this->assertArrayHasKey('error', $r);
        $this->assertEquals(1004, $r['error']['code']);
    }
}