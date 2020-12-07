<?php

namespace TrustOceanSSL\Tests;


class CreateNewUniqueIdTest extends TestCase
{
    protected $isCreate = false;

    public function testCreateNewUniqueId()
    {
        $data = $this->client->createNewUniqueId();

        $this->assertStringContainsString('success', $data->status);
    }
}
