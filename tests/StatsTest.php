<?php

namespace SerwerSMS;

class StatsTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp() {
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testIndex() {
        $r = $this->serwersms->stats->index();
        $this->assertArrayHasKey('items', $r);
    }
}