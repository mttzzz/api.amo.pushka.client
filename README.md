# Laravel API AMOCRM PUSHKA CLIENT

- Обёртка для api.amocrm.pushka.biz

### Install
    composer require mttzzz/api-amocrm-pushka-client

### Publish config
    php artisan vendor:publish --provider mttzzz\ApiAmocrmPushkaClient\ApiAmoServiceProvider
    
Edit app/config/api-amo-pushka.php and fill your Telegram Bot token and chatId or add env variables.
```php
<?php

return [
    'default' => 'apiPushkaKey',
    'account' => 'apiPushkaKey',
];
```

### Usage
```php
$data = ['with' => 'custom_fields'];  //form_params
$responseType = 'object'; //->default('collection'); ['object', 'array', 'collection']
$amo = new Amo();
$accountData = $amo->account->get($data, $responseType); 
```
