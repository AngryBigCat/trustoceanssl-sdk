<?php


namespace TrustOceanSSL\Tests;


use PHPUnit\Framework\TestCase;
use TrustOceanSSL\Client;

class RemoveSanDomainTest extends TestCase
{
    public $products;

    public function testRemoveSanDomain()
    {
        //暂时无法测试（"无法删除 www.xays.top 每个证书至少保留1条域名.）

        $client = new Client('angrycat123@163.com', '04cdd0305d62200abaae047f88c2d45f804f05b03ee2dc2b4914c0f38ef0bcb0');

        $params = ['trustocean_id' => 159417,'domain'=>'www.xays.top'];

        $data = $client->removeSanDomain($params);

        var_dump($data);die();
        $this->assertStringContainsString('success', $data->status);
    }
}
