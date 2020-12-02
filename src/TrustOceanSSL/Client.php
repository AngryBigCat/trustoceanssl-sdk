<?php

namespace TrustOceanSSL;

use TrustOceanSSL\Exception\TrustOceanException;
use TrustOceanSSL\Http\RequestCore;
use TrustOceanSSL\Request\Request;

/**
 * Class Client
 * @package TrustOceanSSL
 * @method \TrustOceanSSL\Result\PingResult                                 ping(array $params = [])
 * @method \TrustOceanSSL\Result\GetProfileInfoResult                       getProfileInfo(array $params = [])
 * @method \TrustOceanSSL\Result\GetProductListResult                       getProductList(array $params = [])
 * @method \TrustOceanSSL\Result\GetPreDomainValidationInformationResult    getPreDomainValidationInformation(array $params = [])
 * @method \TrustOceanSSL\Result\AddSSLOrderResult                          addSSLOrder(array $params = [])
 * @method \TrustOceanSSL\Result\GetDomainValidationStatusResult            getDomainValidationStatus(array $params = [])
 * @method \TrustOceanSSL\Result\ReTryDcvEmailOrDCVCheckResult              reTryDcvEmailOrDCVCheck(array $params = [])
 * @method \TrustOceanSSL\Result\ChangeDCVMethodResult                      changeDCVMethod(array $params = [])
 * @method \TrustOceanSSL\Result\RemoveSanDomainResult                      removeSanDomain(array $params = [])
 * @method \TrustOceanSSL\Result\GetOrderStatusResult                       getOrderStatus(array $params = [])
 * @method \TrustOceanSSL\Result\GetSSLDetailsResult                        getSSLDetails(array $params = [])
 * @method \TrustOceanSSL\Result\ReissueSSLOrderResult                      reissueSSLOrder(array $params = [])
 * @method \TrustOceanSSL\Result\RevokeSSLResult                            revokeSSL(array $params = [])
 * @method \TrustOceanSSL\Result\CancelAndRefundResult                      cancelAndRefund(array $params = [])
 * @method \TrustOceanSSL\Result\CheckRefundStatusResult                    checkRefundStatus(array $params = [])
 * @method \TrustOceanSSL\Result\CheckUniqueIdResult                        checkUniqueId(array $params = [])
 * @method \TrustOceanSSL\Result\GetProductPriceListResult                  getProductPriceList(array $params = [])
 * @method \TrustOceanSSL\Result\GetProductListWithPricingResult            getProductListWithPricing(array $params = [])
 */
class Client
{
    private $username;

    private $password;

    public function __construct(string $username,  string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function __call($name, $arguments)
    {
        $resultClassName = "TrustOceanSSL\\Result\\".ucfirst($name)."Result";
        if (!class_exists($resultClassName)) {
            throw new TrustOceanException('您请求的接口名：'. $name .' 不存在');
        }

        $requestClassName = "TrustOceanSSL\\Request\\".ucfirst($name)."Request";
        if (class_exists($requestClassName)) {
            $request = new $requestClassName($arguments);
            $data = $this->post($name, $request);
        } else {
            $data = $this->post($name);
        }

        return new $resultClassName($data->body);
    }


    private function post(string $action, Request $requestParam = null)
    {
        // 设置默认参数
        if (is_null($requestParam)) {
            $requestParam = new Request();
        }
        $requestParam->username = $this->username;
        $requestParam->password = $this->password;

        // 发送Http请求
        $request = new RequestCore();
        $production_api = 'https://api.trustocean.com/ssl/v5/'.$action;
        $request->set_request_url($production_api);
        $request->set_method(RequestCore::HTTP_POST);
        $request->set_body($requestParam->toArray());
        $response = $request->send_request(true);

        // 如果是json格式，就解析为数组
        if (strpos($response->header['content-type'], 'application/json') !== false) {
            $response->body = json_decode($response->body, true);
        }

        return $response;
    }
}
