<?php


namespace TrustOceanSSL\Result;

use TrustOceanSSL\Model\Product;

class GetProductListWithPricingResult extends Result
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
        return $products;
    }
}
