<?php

namespace TrustOceanSSL;

use TrustOceanSSL\Http\RequestCore;

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
//        $data = $this->post();

        return true;
    }

    public function getProfileInfo()
    {

    }

    public function getProductList()
    {

    }

    public function getPreDomainValidationInformation()
    {

    }

    public function addSSLOrder()
    {

    }

    public function getDomainValidationStatus()
    {

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


    private function post($params = [])
    {
        $request = new RequestCore();

        $action = debug_backtrace()[1]['function'];
        $production_api = 'https://api.trustocean.com/ssl/v5/'.$action;
        $request->set_request_url($production_api);

        $request->set_method(RequestCore::HTTP_POST);

        $params = array_merge($params, [
            'username' => $this->username,
            'password' => $this->password,
        ]);
        $request->set_body($params);

        $response = $request->send_request(true);
        if (strpos($response->header['content-type'], 'application/json') !== false) {
            $response->body = json_decode($response->body, true);
        }

        return $response;
    }
}
