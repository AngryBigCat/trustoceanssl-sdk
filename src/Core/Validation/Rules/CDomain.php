<?php


namespace TrustOceanSSL\Core\Validation\Rules;


use Respect\Validation\Rules\AbstractRule;
use Respect\Validation\Validator as v;

class CDomain extends AbstractRule
{
    public function validate($input): bool
    {
        $domains = array_filter(array_unique(explode(',', $input)));

        foreach ($domains as $domain) {
            if (!v::domain()->validate($domain)) {
                return false;
            }
        }

        return true;
    }
}
