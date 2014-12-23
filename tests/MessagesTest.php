<?php

namespace SerwerSMS;

class MessagesTest extends \PHPUnit_Framework_TestCase {

    protected $serwersms;
    
    protected function setUp(){
        $this->serwersms = new SerwerSMS("demo","demo");
    }

    public function testSendSms() {
        $r = $this->serwersms->messages->sendSms('500600700', 'Test message', 'INFORMACJA', array('test' => true, 'details' => true));
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
        $this->assertArrayHasKey('items', $r);
    }

    public function testSendPersonalized() {
        $messages[] = array(
            'phone' => '500600700',
            'text' => 'First message'
        );
        $messages[] = array(
            'phone' => '600700800',
            'text' => 'Second message'
        );
        $r = $this->serwersms->messages->sendPersonalized($messages, 'INFORMACJA', array('test' => true, 'details' => true));
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
        $this->assertArrayHasKey('items', $r);
    }

    public function testSendVoice() {
        $r = $this->serwersms->messages->sendVoice('500600700', array('text' => 'Test message', 'test' => true, 'details' => true));
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
        $this->assertArrayHasKey('items', $r);
    }

    public function testSendMms() {
        $list = $this->serwersms->files->index('mms');
        $r = $this->serwersms->messages->sendMms('500600700', 'MMS Title', array('test' => true, 'file_id' => $list['items'][0]['id'], 'details' => true));
        $this->assertArrayHasKey('success', $r);
        $this->assertTrue($r['success']);
        $this->assertArrayHasKey('items', $r);
    }

    public function testView() {
        $list = $this->serwersms->messages->reports();
        $r = $this->serwersms->messages->view($list['items'][0]['id']);
        $this->assertArrayHasKey('id', $r);
    }

    public function testReports() {
        $r = $this->serwersms->messages->reports();
        $this->assertArrayHasKey('items', $r);
    }

    public function testDelete() {
        $list = $this->serwersms->messages->reports();
        $r = $this->serwersms->messages->delete($list['items'][0]['id']);
        $this->assertArrayHasKey('success', $r);
        $this->assertFalse($r['success']);
    }

    public function testRecived() {
        $r = $this->serwersms->messages->recived('nd');
        $this->assertArrayHasKey('items', $r);
    }

    public function testSendNd() {
        $r = $this->serwersms->messages->sendNd('500600700','TEST');
        $this->assertArrayHasKey('success', $r);
        $this->assertFalse($r['success']);
    }

    public function testSendNdi() {
        $r = $this->serwersms->messages->sendNdi('500600700','Test message','+48555666777');
        $this->assertArrayHasKey('success', $r);
        $this->assertFalse($r['success']);
    }
}