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
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
    }
    
    public function testIndex() {
        $r = $this->serwersms->files->index('mms');
        $this->assertArrayHasKey('items', $r);
    }
    
    public function testView() {
        $list = $this->serwersms->files->index('mms');
        $r = $this->serwersms->files->view($list['items'][0]['id'],'mms');
        $this->assertArrayHasKey('id', $r);
    }
    
    public function testDelete(){
        $list = $this->serwersms->files->index('voice');
        $r = $this->serwersms->files->delete($list['items'][0]['id'],'voice');
        $this->assertArrayHasKey('success',$r);
        $this->assertTrue($r['success']);
    }
    
}