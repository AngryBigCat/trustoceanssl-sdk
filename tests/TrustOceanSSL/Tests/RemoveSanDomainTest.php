<?php


namespace TrustOceanSSL\Tests;


class RemoveSanDomainTest extends TestCase
{
    public function testRemoveSanDomain()
    {
        //暂时无法测试（"无法删除 www.xays.top 每个证书至少保留1条域名.）

        $params = ['trustocean_id' => 159417,'domain'=>'www.xays.top'];

        $data = $this->client->removeSanDomain($params);

        $this->assertStringContainsString('success', $data->status);
    }
}
