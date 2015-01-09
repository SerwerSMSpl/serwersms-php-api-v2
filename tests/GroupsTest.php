<?php

namespace SerwerSMS;

class GroupsTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testAdd() {
        $r = $this->serwersms->groups->add('test');
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }

    public function testIndex() {
        $r = $this->serwersms->groups->index();
        $this->assertObjectHasAttribute('items', $r);
    }
    
    public function testView() {
        $list = $this->serwersms->groups->index();
        $r = $this->serwersms->groups->view($list->items[0]->id);
        $this->assertObjectHasAttribute('id', $r);
    }

    public function testEdit() {
        $list = $this->serwersms->groups->index();
        $r = $this->serwersms->groups->edit($list->items[0]->id,'New name');
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }

    public function testDelete() {
        $list = $this->serwersms->groups->index();
        $r = $this->serwersms->groups->delete($list->items[0]->id);
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }
    
    public function testCheck(){
        $r = $this->serwersms->groups->check('600700800');
        $this->assertObjectHasAttribute('items', $r);
    }
}