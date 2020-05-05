<?php

namespace mttzzz\ApiAmocrmPushkaClient;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use mttzzz\ApiAmocrmPushkaClient\Traits\ApiAmoPushkaRequestTrait;

class Model
{
    protected $entity;
    protected $requestUrl;
    protected $requestData;
    protected $guzzle;
    protected $responseFormat = 'collection';

    use ApiAmoPushkaRequestTrait;

    public function __construct(Client $guzzle, $entity)
    {
        $this->guzzle = $guzzle;
        $this->entity = $entity;
    }

    public function __call($method, $data)
    {
        switch ($method) {
            case 'get':
            case 'list':
                $this->setRequestData(['parameters' => Arr::first($data)], $method);
                break;
            case 'unlink_catalog_elements':
                $this->setRequestData(['request' => Arr::first($data)], $method);
                break;
            default:
                $this->setRequestData([$this->entity => Arr::first($data)], $method);
        }
        $this->responseFormat = $data[1] ?? $this->responseFormat;
        return $this->request();
    }
}
