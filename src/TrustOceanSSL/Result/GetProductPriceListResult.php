<?php


namespace TrustOceanSSL\Result;

use TrustOceanSSL\Model\Product;

class GetProductPriceListResult extends Result
{
    /**
     * @var Product[]
     */
    public $products;

    public function parseProducts()
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = new Product($product);
        }

        $this->products = $products;
    }
}
