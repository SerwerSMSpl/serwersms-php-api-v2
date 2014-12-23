<?php

namespace SerwerSMS;

class BlacklistTest extends \PHPUnit_Framework_TestCase {
    
    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testAdd() {

        $r = $this->serwersms->blacklist->add('500600720');
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
    }

    public function testIndex() {

        $r = $this->serwersms->blacklist->index();
        $this->assertArrayHasKey('items', $r);
    }
    
    public function testCheck() {

        $r = $this->serwersms->blacklist->check('500600720');
        $this->assertArrayHasKey('exists', $r);
        $this->assertTrue($r['exists']);
    }

    public function testDelete() {

        $r = $this->serwersms->blacklist->delete('500600720');
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
    }

}