<?php

namespace TrustOceanSSL;

use TrustOceanSSL\Http\RequestCore;
use TrustOceanSSL\Request\AddSSLOrderRequest;
use TrustOceanSSL\Request\ChangeDCVMethodRequest;
use TrustOceanSSL\Request\GetDomainValidationStatusRequest;
use TrustOceanSSL\Request\GetPreDomainValidationInformationRequest;
use TrustOceanSSL\Request\ReissueSSLOrderRequest;
use TrustOceanSSL\Request\Request;
use TrustOceanSSL\Request\ReTryDcvEmailOrDCVCheckRequest;
use TrustOceanSSL\Request\RevokeSSLRequest;
use TrustOceanSSL\Request\TrustoceanIdAndDomainRequest;
use TrustOceanSSL\Request\TrustoceanIdRequest;
use TrustOceanSSL\Result\AddSSLOrderResult;
use TrustOceanSSL\Result\GetDomainValidationStatusResult;
use TrustOceanSSL\Result\GetPreDomainValidationInformationResult;
use TrustOceanSSL\Result\GetProductListResult;
use TrustOceanSSL\Result\GetProfileInfoResult;
use TrustOceanSSL\Result\PingResult;
use TrustOceanSSL\Result\ReTryDcvEmailOrDCVCheckResult;

class Client
{
    private $username;

    private $password;

    public function __construct(string $username,  string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function ping()
    {
        $data = $this->post();

        return new PingResult($data->body);
    }

    public function getProfileInfo()
    {
        $data = $this->post();

        return new GetProfileInfoResult($data->body);
    }

    public function getProductList()
    {
        $data = $this->post();

        return new GetProductListResult($data->body);
    }

    public function getPreDomainValidationInformation($params)
    {
        $request = new GetPreDomainValidationInformationRequest($params);

        $data = $this->post($request);

        return new GetPreDomainValidationInformationResult($data->body);
    }

    public function addSSLOrder($params)
    {
        $request = new AddSSLOrderRequest($params);

        $data = $this->post($request);

        return new AddSSLOrderResult($data->body);
    }

    public function getDomainValidationStatus($params)
    {
        $request = new TrustoceanIdRequest($params);

        $data = $this->post($request);

        return new GetDomainValidationStatusResult($data->body);
    }

    public function reTryDcvEmailOrDCVCheck($params)
    {
        $request = new TrustoceanIdRequest($params);

        $data = $this->post($request);

        return new ReTryDcvEmailOrDCVCheckResult($data->body);
    }

    public function changeDCVMethod($params)
    {
        $request = new ChangeDCVMethodRequest($params);

        $data = $this->post($request);

    }

    public function removeSanDomain($params)
    {
        $request = new TrustoceanIdAndDomainRequest($params);

        $data = $this->post($request);

    }

    public function getOrderStatus($params)
    {
        $request = new TrustoceanIdRequest($params);

        $data = $this->post($request);

    }

    public function getSSLDetails($params)
    {
        $request = new TrustoceanIdRequest($params);

        $data = $this->post($request);
    }

    public function reissueSSLOrder($params)
    {
        $request = new ReissueSSLOrderRequest($params);

        $data = $this->post($request);
    }

    public function revokeSSL($params)
    {
        $request = new RevokeSSLRequest($params);

        $data = $this->post($request);

    }

    public function cancelAndRefund($params)
    {
        $request = new TrustoceanIdRequest($params);

        $data = $this->post($request);
    }

    public function checkRefundStatus($params)
    {
        $request = new TrustoceanIdRequest($params);

        $data = $this->post($request);
    }

    public function checkUniqueId($params)
    {
        $request = new TrustoceanIdRequest($params);

        $data = $this->post($request);
    }

    public function getProductPriceList()
    {
        //无
    }

    public function getProductListWithPricing()
    {
        //无
    }


    private function post(Request $requestParam = null)
    {
        $request = new RequestCore();

        $action = debug_backtrace()[1]['function'];
        $production_api = 'https://api.trustocean.com/ssl/v5/'.$action;
        $request->set_request_url($production_api);

        $request->set_method(RequestCore::HTTP_POST);

        if (is_null($requestParam)) {
            $requestParam = new Request();
        }
        $requestParam->username = $this->username;
        $requestParam->password = $this->password;
        $request->set_body($requestParam->toArray());

        $response = $request->send_request(true);
        if (strpos($response->header['content-type'], 'application/json') !== false) {
            $response->body = json_decode($response->body, true);
        }

        return $response;
    }
}
