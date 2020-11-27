<?php


namespace TrustOceanSSL\Result;


use TrustOceanSSL\Model\Product;


class GetProductListResult extends Result
{
    /**
     * @var Product[];
     */
    public $products;

    protected function parseProducts()
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = new Product($product);
        }

        $this->products = $products;
    }
}
