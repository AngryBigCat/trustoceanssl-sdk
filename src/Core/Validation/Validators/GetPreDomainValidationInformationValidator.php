<?php


namespace TrustOceanSSL\Core\Validation\Validators;


use Respect\Validation\Factory;
use Respect\Validation\Validator as v;

class GetPreDomainValidationInformationValidator implements Validator
{
    public function validate(array $arguments)
    {

        v::key('domains', v::stringType())
            ->key('csr_code', v::stringType())
            ->key('unique_id', v::stringType())
            ->validate($arguments);


    }
}
