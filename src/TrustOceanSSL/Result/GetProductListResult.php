<?php


namespace TrustOceanSSL\Result;


use TrustOceanSSL\Model\Product;


class GetProductListResult extends Result
{
    public $products;

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = new Product($product);
        }
        return $products;
    }
}
