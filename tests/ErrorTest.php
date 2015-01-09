<?php

namespace SerwerSMS;

class ErrorTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testView() {
        try{
            $r = $this->serwersms->error->view(1000);
            $this->assertObjectHasAttribute('error', $r);
            $this->assertEquals(1000, $r->error->code);
        } catch(Exception $e){
            
        }
    }
    
}