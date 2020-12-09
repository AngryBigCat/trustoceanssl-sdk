<?php


namespace TrustOceanSSL\Tests;


class RemoveSanDomainTest extends TestCase
{
    public function testRemoveSanDomain()
    {
        //暂时无法测试（"无法删除 www.xays.top 每个证书至少保留1条域名.）

        $params = [
            'trustocean_id' => $this->trustocean_id,
            'domain'=>'a.nskong.com'
        ];

        $data = $this->client->removeSanDomain($params);

        if ($data->status == 'error') {
            var_dump($data->message);
        }

        $this->assertStringContainsString('success', $data->status);
    }
}
