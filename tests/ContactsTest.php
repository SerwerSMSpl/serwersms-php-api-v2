<?php

namespace SerwerSMS;

class ContactTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testAdd() {
        
        $params = array(
            'email' => 'test@mail.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => 'Hello Word!'
        );

        $r = $this->serwersms->contacts->add(123,'500600800',$params);
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }

    public function testIndex() {

        $r = $this->serwersms->contacts->index();
        $this->assertObjectHasAttribute('items', $r);
    }

    public function testView(){
        
        $list = $this->serwersms->contacts->index();
        $r = $this->serwersms->contacts->view($list->items[0]->id);
        $this->assertObjectHasAttribute('id', $r);
    }
    
    public function testEdit() {

        $list = $this->serwersms->contacts->index();

        $params = array(
            'email' => 'test@mail.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => 'Hello Word!'
        );

        $r = $this->serwersms->contacts->edit($list->items[0]->id,123,'500600700',$params);
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }

    public function testDelete() {
        
        $list = $this->serwersms->contacts->index();
        $r = $this->serwersms->contacts->delete($list->items[0]->id);
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }
    
    public function testImport(){
        
        $contact[] = array(
            'phone' => '500600700',
            'email' => 'test@mail.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => 'Hello Word!'
        );
        $contact[] = array(
            'phone' => '500600800',
            'email' => 'test@mail.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => 'Hello Word!'
        );
        
        $r = $this->serwersms->contacts->import('New group', $contact);
        $this->assertObjectHasAttribute('success', $r);
        $this->assertTrue($r->success);
    }
}