<?php

namespace TrustOceanSSL\Tests;


class CreateNewUniqueIdTest extends TestCase
{
    public function testCreateNewUniqueId()
    {
        $data = $this->client->createNewUniqueId();

        $this->assertStringContainsString('success', $data->status);
    }
}
