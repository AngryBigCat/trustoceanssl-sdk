<?php

namespace TrustOceanSSL;

use TrustOceanSSL\Http\RequestCore;
use TrustOceanSSL\Request\AddSSLOrderRequest;
use TrustOceanSSL\Request\Request;
use TrustOceanSSL\Result\AddSSLOrderResult;
use TrustOceanSSL\Result\GetDomainValidationStatusResult;
use TrustOceanSSL\Result\GetPreDomainValidationInformationResult;
use TrustOceanSSL\Result\GetProductListResult;
use TrustOceanSSL\Result\GetProfileInfoResult;
use TrustOceanSSL\Result\PingResult;

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

    public function getPreDomainValidationInformation()
    {
        $data = $this->post();

        return new GetPreDomainValidationInformationResult($data);
    }

    public function addSSLOrder($params)
    {
        $request = new AddSSLOrderRequest($params);

        $data = $this->post($request);

        return new AddSSLOrderResult($data);
    }

    public function getDomainValidationStatus()
    {
        $data = $this->post();

        return new GetDomainValidationStatusResult($data);
    }

    public function reTryDcvEmailOrDCVCheck()
    {

    }

    public function changeDCVMethod()
    {

    }

    public function removeSanDomain()
    {

    }

    public function getOrderStatus()
    {

    }

    public function getSSLDetails()
    {

    }

    public function reissueSSLOrder()
    {

    }

    public function revokeSSL()
    {

    }

    public function cancelAndRefund()
    {

    }

    public function checkRefundStatus()
    {

    }

    public function checkUniqueId()
    {

    }
    public function getProductPriceList()
    {

    }

    public function getProductListWithPricing()
    {

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
