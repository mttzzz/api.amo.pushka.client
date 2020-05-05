<?php

namespace mttzzz\ApiAmocrmPushkaClient;

use GuzzleHttp\Client;

class AmoPushkaClient
{
    const BASE_URL = 'https://api.amocrm.pushka.biz/api/';
    protected $guzzle;

    public function __construct($key, $v = 'v2')
    {
        $this->guzzle = new Client(['base_uri' => self::BASE_URL . $v . '/','query' => ['key' => $key]]);
    }

    function __get($property)
    {
        $class = __NAMESPACE__ . '\Model';
        return new $class($this->guzzle, $property);
    }
}
