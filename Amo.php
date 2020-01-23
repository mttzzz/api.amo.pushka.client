<?php


namespace mttzzz\ApiAmocrmPushkaClient;


use GuzzleHttp\Client;

class Amo
{
    const BASE_URL = 'https://api.amocrm.pushka.biz/api/';

    protected $guzzle;

    public function __construct($account = 'default', $v = 'v2')
    {
        $this->guzzle = new Client([
            'base_uri' => self::BASE_URL . $v . '/',
            'query' => ['key' => config('api-amo-pushka.' . $account)]
        ]);
    }

    function __get($property)
    {
        $class = __NAMESPACE__ . '\Model';
        return new $class($this->guzzle, $property);
    }
}
