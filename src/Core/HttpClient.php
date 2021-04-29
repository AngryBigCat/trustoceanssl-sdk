<?php


namespace TrustOceanSSL\Core\Http;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use TrustOceanSSL\Core\Exceptions\HttpClientException;

class HttpClient
{

    private $endpoint;

    private $httpClient;

    private static $REQUEST_METHOD = 'POST';

    private static $REQUEST_USER_AGENT = 'trustoceanssl-sdk/2.0';

    private static $REQUEST_ACCEPT = 'application/json';

    private static $REQUEST_CONTENT_TYPE = 'application/x-www-form-urlencoded';

    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;

        $this->httpClient = new Client([
            RequestOptions::HEADERS => [
                'User-Agent' => self::$REQUEST_USER_AGENT,
                'Accept' => self::$REQUEST_ACCEPT,
                'Content-Type' => self::$REQUEST_CONTENT_TYPE,
            ],
        ]);
    }

    public function request($name, $arguments)
    {
        try {
            $resp = $this->httpClient->request(self::$REQUEST_METHOD, $this->getRequestUrl($name), [
                RequestOptions::BODY => $arguments
            ]);
        } catch (GuzzleException $exception) {
            throw new HttpClientException('HttpClient request error: ' . $exception->getMessage());
        }

        if ($resp->getStatusCode() !== 200) {
            throw new HttpClientException('HttpClient response status code is not equal 200');
        }

        if (!$resp->hasHeader('Content-Type') || $resp->getHeader('Content-Type') != 'application/json') {
            throw new HttpClientException('HttpClient response content-type is not equal application/json');
        }

        if (empty($content = $resp->getBody()->getContents())) {
            throw new HttpClientException('HttpClient response body is empty');
        }

        $data = json_decode($content, true);
        if (json_last_error()) {
            throw new HttpClientException('HttpClient response content decode error');
        }

        return $data;
    }

    public function getRequestUrl($name)
    {
        $endpoint = $this->getFullyEndpoint();

        if (substr($endpoint, -1) !== DIRECTORY_SEPARATOR) {
            $endpoint .= DIRECTORY_SEPARATOR;
        }

        return $endpoint.$name;
    }

    private function getFullyEndpoint()
    {
        $endpoint = $this->endpoint;

        if (strpos($this->endpoint, 'https://') === false) {
            $endpoint = 'https://'.$endpoint;
        }

        return $endpoint;
    }
}
