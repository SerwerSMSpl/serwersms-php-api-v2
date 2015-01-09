<?php

namespace SerwerSMS;

class FileTest extends \PHPUnit_Framework_TestCase {
    
    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testAdd() {
        $params = array(
            'url' => 'https://panel.serwersms.pl/demo/demo.wav',
            'name' => 'Demo wav'
        );
        $r = $this->serwersms->files->add('voice',$params);
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }
    
    public function testIndex() {
        $r = $this->serwersms->files->index('mms');
        $this->assertObjectHasAttribute('items', $r);
    }
    
    public function testView() {
        $list = $this->serwersms->files->index('mms');
        $r = $this->serwersms->files->view($list->items[0]->id,'mms');
        $this->assertObjectHasAttribute('id', $r);
    }
    
    public function testDelete(){
        $list = $this->serwersms->files->index('voice');
        $r = $this->serwersms->files->delete($list->items[0]->id,'voice');
        $this->assertObjectHasAttribute('success',$r);
        $this->assertTrue($r->success);
    }
    
}