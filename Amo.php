<?php


namespace mttzzz\ApiAmocrmPushkaClient;


use GuzzleHttp\Client;

class Amo
{
    const BASE_URL = 'https://api.amocrm.pushka.biz/api/';
    protected $guzzle;

    public function __construct($account = 'default', $v = 'v2')
    {
        if (!$key = config('api-amo-pushka.' . $account)) {
            $key = $this->getPushkaKey($v, $account);
        }
        $this->guzzle = new Client([
            'base_uri' => self::BASE_URL . $v . '/',
            'query' => ['key' => $key]
        ]);
    }

    function __get($property)
    {
        $class = __NAMESPACE__ . '\Model';
        return new $class($this->guzzle, $property);
    }

    public function getPushkaKey($v, $account)
    {
        $guzzle = new Client();
        return $guzzle->post(self::BASE_URL . $v . '/get-pushka-key', [
            'form_params' => ['subdomain' => $account],
            'headers' => ['Authorization' => 'Bearer '.config('api-amo-pushka.token')]
        ])->getBody()->getContents();
    }
}
