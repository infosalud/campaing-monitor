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

Route::get('list', function(){
    dd((new LandingPageSubscriber())->add([
        'email' => 'tiril@infosalud.app',
        'name' => 'Tiril Tveiten',
    ]));
});
