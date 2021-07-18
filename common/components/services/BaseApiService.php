<?php


namespace common\components\services;


use GuzzleHttp;
use yii\base\InvalidArgumentException;

class BaseApiService extends BaseDataService
{
    public string $domain;

    public ?string $token;

    public string $type = 'Bearer';

    public function __construct($config = [])
    {
        if (empty($config['domain']))
            throw new InvalidArgumentException("Config params is invalid.");
        $this->domain = $config['domain'];
        $this->token = $config['token'] ?? null;
        $this->type = $config['type'] ?? 'Bearer';

        parent::__construct($config);
    }

    public function call($method = 'GET', $url = '', $params = [], $extra_headers = [])
    {
        $link = rtrim($this->domain, '/') . '/' . ltrim(stripVietnamese($url), '/');
        $client = new GuzzleHttp\Client();
        if (!empty($this->token))
            $headers = array_merge($extra_headers, [
                'Authorization' => "$this->type $this->token"
            ]);
        else
            $headers =$extra_headers;

        switch ($method) {
            case 'POST':
            case 'post':
                $response = $client->request(
                    $method,
                    $link,
                    [
                        GuzzleHttp\RequestOptions::CONNECT_TIMEOUT => 5,
                        GuzzleHttp\RequestOptions::TIMEOUT => 10,
                        'form_params' => $params,
                        'headers' => $headers
                    ]
                )->getBody()->getContents();
                break;
            case 'GET':
            case 'get':
                $response = $client->request(
                    $method,
                    $link,
                    [
                        GuzzleHttp\RequestOptions::CONNECT_TIMEOUT => 5,
                        GuzzleHttp\RequestOptions::TIMEOUT => 10,
                        'query' => $params,
                        'headers' => $headers
                    ]
                )->getBody()->getContents();
                break;
            default:
                break;
        }
        return $response ?? null;
    }
}