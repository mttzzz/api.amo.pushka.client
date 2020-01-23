<?php

namespace mttzzz\ApiAmocrmPushkaClient\Traits;

trait ApiAmoPushkaRequestTrait
{
    protected $result;

    public function request()
    {
        $this->result = $this->guzzle->post($this->requestUrl, ['form_params' => $this->requestData]);
        $this->result = $this->result->getBody()->getContents();
        return $this->responseData();
    }

    public function responseData()
    {
        switch ($this->responseFormat) {
            case 'collection':
                return collect(json_decode($this->result, 1));
            case 'array':
                return json_decode($this->result, 1);
            case 'object':
                return json_decode($this->result);
        }
    }

    public function setRequestData($data, $method = null)
    {
        $this->requestData = $data;
        $this->requestUrl = $this->entity . '/' . $method;
    }
}
