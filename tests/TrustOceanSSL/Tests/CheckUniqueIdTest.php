<?php


namespace TrustOceanSSL\Tests;


use PHPUnit\Framework\TestCase;
use TrustOceanSSL\Client;

class CheckUniqueIdTest extends TestCase
{
    public $products;

    public function testCheckUniqueId()
    {
        $client = new Client('angrycat123@163.com', '04cdd0305d62200abaae047f88c2d45f804f05b03ee2dc2b4914c0f38ef0bcb0');

        $params = ['unique_id' => 'un32ms0902'];

        $data = $client->checkUniqueId($params);

//        var_dump($data);die();
        $this->assertStringContainsString('success', $data->status);
    }
}
