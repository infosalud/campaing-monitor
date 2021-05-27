<?php

use App\Subscribers\LandingPageSubscriber;
use InfoSalud\CampaingMonitor\Emails\Welcome;
// MyVendor\contactform\src\routes\web.php
Route::get('contact', function(){
    dd((new Welcome())->sendTo([
        'email' => 'jaime@infosalud.app',
        'token_url' => ''
    ]));
});

Route::get('key', function(){

    /* $client_id = 123130;
    $redirect_uri = 'https://infosalud.app/website';
    $client_secret = '5CQFCId7ZTQ4IZ2AD5Z2Xe64625u95VFzWV2ExMv6b7835p2b9RMLqGHID58246HzdlD2bk7485u76YT';
    $code = 'wsdefflkdslfl';
    $result = CS_REST_General::exchange_token($client_id, $client_secret, $redirect_uri, $code);

    $result = new CampaignMonitor(); */

    /* $wrap = new CS_REST_Subscribers('085b8da4c6c0dc14625db988d1f0c37a', 'Zf7J3FVBLfuY4u6CIvsUqatOXZiJBQgKxu2B7/OPmcf2baTDbbEuQ3mfosRk83E10ZGPbkFjhKMdni6fM7qKfab1mjbuk/uyS4e4kKxwA+6jH4jyYj00aTPghTEz+80KvV4RHjUvwLJlYSFu3whdFg==');
    dd ( $wrap->add(array(
    'EmailAddress' => 'jc260985@gmail.com',
    'Name' => 'Jaime Castrillo',
    'Resubscribe' => true,
    'ConsentToTrack' => 'yes',
    ))
    ); */

    dd((new LandingPageSubscriber())->add([
        'email' => 'tiril@infosalud.app',
        'name' => 'Tiril Tveiten',
    ]));

    
});
