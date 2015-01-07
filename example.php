<?php

require_once('vendor/autoload.php');

try{
    $serwersms = new SerwerSMS\SerwerSMS('demo','demo');
    
    // Send ECO SMS
    $result = $serwersms->messages->sendSms('+48500600700','Test ECO message', null, array('test' => true, 'details' => true));
    var_dump($result);
    
    // Send FULL SMS
    $result = $serwersms->messages->sendSms('+48500600700','Test FULL message', 'INFORMACJA', array('test' => true, 'details' => true));
    var_dump($result);
    
    // Send personalized messages
    $messages[] = array(
            'phone' => '500600700',
            'text' => 'First message'
        );
    $messages[] = array(
        'phone' => '600700800',
        'text' => 'Second message'
    );
    $result = $serwersms->messages->sendPersonalized($messages, 'INFORMACJA', array('test' => true, 'details' => true));
    var_dump($result);
    
    // Send VOICE from text
    $result = $serwersms->messages->sendVoice('500600700', array('text' => 'Test message', 'test' => true, 'details' => true));
    var_dump($result);
    
    // Send MMS
    $list = $serwersms->files->index('mms');
    $result = $serwersms->messages->sendMms('500600700', 'MMS Title', array('test' => true, 'file_id' => $list['items'][0]['id'], 'details' => true));
    var_dump($result);
    
    // Get messages reports
    $message_id = array('09d3e84be1','1c7a5432c9');
    $result = $serwersms->messages->reports(array('id' => $message_id));
    var_dump($result);
    
    // Get recived messages
    $result = $serwersms->messages->recived('ndi');
    var_dump($result);
    
} catch (Exception $e) {
    echo 'Exception: '.$e->getMessage();
}