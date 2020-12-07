<?php


namespace TrustOceanSSL\Model;


class Product extends Model
{
    public $pid;

    public $name;

    public $chineseName;

    public $class;

    public $multidomain;

    public $wildcard;

    public $ipv4;

    public $brand;

    public $seal;

    public $score;

    /**
     * @var array
     */
    public $periods;

    /**
     * @var ProductPricing[]
     */
    public $pricing;

    public function parsePricing($pricing)
    {
        foreach ($pricing as $key => $value) {
            $this->pricing[$key] = new ProductPricing($value);
        }
    }
}
