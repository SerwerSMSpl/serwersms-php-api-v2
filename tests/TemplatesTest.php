<?php

namespace SerwerSMS;

class TemplatesTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testIndex() {
        $r = $this->serwersms->templates->index();
        $this->assertArrayHasKey('items', $r);
    }
    
    public function testAdd() {
        $r = $this->serwersms->templates->add('New template', 'Message from template');
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
    }
    
    public function testEdit() {
        $list = $this->serwersms->templates->index();
        $r = $this->serwersms->templates->edit($list['items'][0]['id'],'New template', 'Editing message from template');
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
    }
    
    public function testDelete() {
        $list = $this->serwersms->templates->index();
        $r = $this->serwersms->templates->delete($list['items'][0]['id']);
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
    }

}