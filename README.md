# SerwerSMS.pl PHP Client API v2
Klient PHP do komunikacji zdalnej z API v2 SerwerSMS.pl

W celu autoryzacji za pośrednictwem Tokenu API, należy wygenerować go po stronie Panelu Klienta w menu Ustawienia interfejsów  → HTTP API → Tokeny API. Format nagłówka autoryzacyjnego jest zgodna z formatem Bearer token

#### Wysyłka SMS
```php
require_once('vendor/autoload.php');

try{
  $serwersms = new SerwerSMS\SerwerSMS($token);
  
  // SMS FULL
  $result = $serwersms->messages->sendSms(
            array(
                    '+48500600700',
                    '+48600700800'
            ),
            'Test FULL message',
            'INFORMACJA',
            array(
                    'test' => true,
                    'details' => true
            )
  );
  
  // SMS ECO
  $result = $serwersms->messages->sendSms(
            array(
                    '+48500600700',
                    '+48600700800'
            ),
            'Test ECO message',
            null,
            array(
                    'test' => true,
                    'details' => true
            )
  );

  // VOICE from text
  $result = $serwersms->messages->sendVoice(
            array(
                    '+48500600700',
                    '+48600700800'
            ),
            array(
                    'text' => 'Test message',
                    'test' => true,
                    'details' => true
            )
  );
  
  // MMS
  $list = $serwersms->files->index('mms');
  $result = $serwersms->messages->sendMms(
            array(
                    '+48500600700',
                    '+48600700800'
            ),
            'MMS Title',
            array(
                    'test' => true,
                    'file_id' => $list->items[0]->id,
                    'details' => true
            )
  );
  
  echo 'Skolejkowano: '.$result->queued.'<br />';
  echo 'Niewysłano: '.$result->unsent.'<br />';
  
  foreach($result->items as $sms){
    echo 'ID: '.$sms->id.'<br />';
    echo 'NUMER: '.$sms->phone.'<br />';
    echo 'STATUS: '.$sms->status.'<br />';
    echo 'CZĘŚCI: '.$sms->parts.'<br />';
    echo 'WIADOMOŚĆ: '.$sms->text.'<br />';
  }
    
} catch(Exception $e){
  echo 'ERROR: '.$e->getMessage();
}
```

#### Wysyłka spersonalizowanych SMS
```php
require_once('vendor/autoload.php');

try{
  $serwersms = new SerwerSMS\SerwerSMS($token);

  $messages[] = array(
      'phone' => '500600700',
      'text' => 'First message'
  );
  $messages[] = array(
      'phone' => '600700800',
      'text' => 'Second message'
  );
  
  $result = $serwersms->messages->sendPersonalized(
            $messages,
            'INFORMACJA',
            array(
                    'test' => true,
                    'details' => true
            )
  );
  
  echo 'Skolejkowano: '.$result->queued.'<br />';
  echo 'Niewysłano: '.$result->unsent.'<br />';
  
  foreach($result->items as $sms){
    echo 'ID: '.$sms->id.'<br />';
    echo 'NUMER: '.$sms->phone.'<br />';
    echo 'STATUS: '.$sms->status.'<br />';
    echo 'CZĘŚCI: '.$sms->parts.'<br />';
    echo 'WIADOMOŚĆ: '.$sms->text.'<br />';
  }
    
} catch(Exception $e){
  echo 'ERROR: '.$e->getMessage();
}
```

#### Pobieranie raportów doręczeń
```php
require_once('vendor/autoload.php');

try{
  $serwersms = new SerwerSMS\SerwerSMS($token);

  // Get messages reports
  $result = $serwersms->messages->reports(array('id' => array('aca3944055')));

  foreach($result->items as $sms){
    echo 'ID: '.$sms->id.'<br />';
    echo 'NUMER: '.$sms->phone.'<br />';
    echo 'STATUS: '.$sms->status.'<br />';
    echo 'SKOLEJKOWANO: '.$sms->queued.'<br />';
    echo 'WYSŁANO: '.$sms->sent.'<br />';
    echo 'DORĘCZONO: '.$sms->delivered.'<br />';
    echo 'NADAWCA: '.$sms->sender.'<br />';
    echo 'TYP: '.$sms->type.'<br />';
    echo 'WIADOMOŚĆ: '.$sms->text.'<br />';
  }

} catch(Exception $e){
  echo 'ERROR: '.$e->getMessage();
}
```

#### Pobieranie wiadomości przychodzących
```php
require_once('vendor/autoload.php');

try{
  $serwersms = new SerwerSMS\SerwerSMS($token);

  // Get recived messages
  $result = $serwersms->messages->recived('ndi');

  foreach($result->items as $sms){
    echo 'ID: '.$sms->id.'<br />';
    echo 'TYP: '.$sms->type.'<br />';
    echo 'NUMER: '.$sms->phone.'<br />';
    echo 'DATA: '.$sms->recived.'<br />';
    echo 'CZARNA LISTA: '.$sms->blacklist.'<br />';
    echo 'WIADOMOŚĆ: '.$sms->text.'<br />';
  }

} catch(Exception $e){
  echo 'ERROR: '.$e->getMessage();
}
```
## Wymagania

php >= 5.3.0

lib-curl >= 7.1

## Dokumentacja
http://dev.serwersms.pl

Konsola api:
http://apiconsole.serwersms.pl

## Instalacja

Instalacja przez Composera (https://getcomposer.org/):
```
composer require serwersms/serwersms-php-client
```
