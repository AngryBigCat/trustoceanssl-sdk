<?php

namespace TrustOceanSsl\Core;




use TrustOceanSSL\Core\Exceptions\ClientException;
use TrustOceanSSL\Core\Http\HttpClient;
use TrustOceanSSL\Core\Validation\ValidateRequest;
use TrustOceanSSL\Core\Validation\Validator;

class Client
{
    private $endpoint;

    private $credentials;

    private $httpClient;

    private static $Apis = [
        'ping',
        'getProfileInfo',
        'getProductList',
        'getPreDomainValidationInformation',
        'addSSLOrder',
        'getDomainValidationStatus',
        'reTryDcvEmailOrDCVCheck',
        'changeDCVMethod',
        'removeSanDomain',
        'getOrderStatus',
        'getSSLDetails',
        'reissueSSLOrder',
        'revokeSSL',
        'cancelAndRefund',
        'checkRefundStatus',
        'createNewUniqueId',
        'checkUniqueId',
        'getProductPriceList',
        'getProductPriceList',
    ];

    public function __construct(string $endpoint, Credentials $credentials)
    {
        $this->endpoint = $endpoint;

        $this->credentials = $credentials;

    }

    public function __call($name, $arguments)
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new HttpClient($this->endpoint);
        }

        if (!in_array($name, self::$Apis)) {
            throw new ClientException('请求的接口方法不正确，目前仅支持这些方法：'.implode(',', self::$Apis));
        }

        try {
            Validator::make($name)->validate($arguments);
        } catch (\Exception $e) {
            throw new ClientException('请求参数不正确：' . $e->getMessage());
        }

        try {
            $data = $this->httpClient->request($name, $this->mergeArguments($arguments));
        } catch (\Exception $exception) {
            throw new ClientException('网络请求出错：'. $exception->getMessage());
        }

        if (!isset($data['status'])) {
            throw new ClientException('请求响应格式不正确：status is not exists');
        }

        if ($data['status'] !== 'success') {
            $message = isset($data['message']) ? $data['message'] : null;
            $error_code = isset($data['error_code']) ? $data['error_code'] : null;
            throw new ClientException('接口请求失败，错误消息：' . $message . ', 错误代码：' . $error_code);
        }

        return $data;
    }

    private function mergeArguments($arguments)
    {
        return array_merge($arguments, [
            'username' => $this->credentials->getUsername(),
            'password' => $this->credentials->getPassword()
        ]);
    }
}
