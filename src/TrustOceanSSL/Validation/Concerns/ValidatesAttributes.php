<?php


namespace TrustOceanSSL\Validation\Concerns;


use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Pdp\Domain;

trait ValidatesAttributes
{
    public function validateString($attribute, $value)
    {
        return is_string($value);
    }

    public function validateRequired($attribute, $value)
    {
        if (is_null($value)) {
            return false;
        } elseif (is_string($value) && trim($value) === '') {
            return false;
        } elseif ((is_array($value) || $value instanceof \Countable) && count($value) < 1) {
            return false;
        }

        return true;
    }

    public function validateInteger($attribute, $value)
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function validateUrl($attribute, $value)
    {
        if (! is_string($value)) {
            return false;
        }

        /*
         * This pattern is derived from Symfony\Component\Validator\Constraints\UrlValidator (5.0.7).
         *
         * (c) Fabien Potencier <fabien@symfony.com> http://symfony.com
         */
        $pattern = '~^
            (https)://                                 # protocol
            (((?:[\_\.\pL\pN-]|%[0-9A-Fa-f]{2})+:)?((?:[\_\.\pL\pN-]|%[0-9A-Fa-f]{2})+)@)?  # basic auth
            (
                ([\pL\pN\pS\-\_\.])+(\.?([\pL\pN]|xn\-\-[\pL\pN-]+)+\.?) # a domain name
                    |                                                 # or
                \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}                    # an IP address
                    |                                                 # or
                \[
                    (?:(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){6})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:::(?:(?:(?:[0-9a-f]{1,4})):){5})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){4})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,1}(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){3})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,2}(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){2})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,3}(?:(?:[0-9a-f]{1,4})))?::(?:(?:[0-9a-f]{1,4})):)(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,4}(?:(?:[0-9a-f]{1,4})))?::)(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,5}(?:(?:[0-9a-f]{1,4})))?::)(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,6}(?:(?:[0-9a-f]{1,4})))?::))))
                \]  # an IPv6 address
            )
            (:[0-9]+)?                              # a port (optional)
            (?:/ (?:[\pL\pN\-._\~!$&\'()*+,;=:@]|%[0-9A-Fa-f]{2})* )*          # a path
            (?:\? (?:[\pL\pN\-._\~!$&\'\[\]()*+,;=:@/?]|%[0-9A-Fa-f]{2})* )?   # a query (optional)
            (?:\# (?:[\pL\pN\-._\~!$&\'()*+,;=:@/?]|%[0-9A-Fa-f]{2})* )?       # a fragment (optional)
        $~ixu';

        return preg_match($pattern, $value) > 0;
    }

    public function validateIn($attribute, $value, $parameters)
    {
        return in_array((string) $value, $parameters);
    }

    public function validateEmail($attribute, $value)
    {
        if (! is_string($value) && ! (is_object($value) && method_exists($value, '__toString'))) {
            return false;
        }

        return (new EmailValidator)->isValid($value, new MultipleValidationWithAnd([new RFCValidation()]));
    }

    protected function validateDomains($attribute, $value)
    {
        $domains = explode(',', $value);

        foreach ($domains as $domain) {
            if (!$this->validateDomain($attribute, $domain)) {
                return false;
            }
        }

        return true;
    }

    protected function validateNoRepeat($attribute, $value)
    {
        $domains = explode(',', $value);
        if (count($domains) !== count(array_unique($domains))) {
            return false;
        }

        return true;
    }

    protected function validateDomain($attribute, $domain)
    {
        $domain = new Domain($domain);

        // 检查是否为IDN域名
        if ($domain->toAscii()->getContent() !== $domain->getContent()) {
            return false;
        }

        return $domain->isResolvable();
    }

    protected function validateCheckCsrCode($attribute, $value)
    {
        $csrData = openssl_csr_get_public_key($value);

        return !is_null($csrData);
    }

    protected function validateCheckDcvMethod($attribute, $value)
    {
        $dcvMethods = explode(',', $value);
        foreach ($dcvMethods as $dcvMethod) {
            if (strpos($value, '@') === false) {
                if (!in_array($dcvMethod, ['dns', 'http', 'https'])) {
                    return false;
                }
            } else {
                if (!$this->validateEmail($attribute, $dcvMethod)) {
                    return false;
                }
            }
        }

        return true;
    }

    protected function validateCheckEqualLength($attribute, $value, $params)
    {
        if (!isset($params[0])) {
            return false;
        }

        $dcvMethodName = $params[0];
        if (!array_key_exists($dcvMethodName, $this->data)) {
            return false;
        }

        $dcvMethods = explode(',', $this->data[$dcvMethodName]);
        $domains = explode(',', $value);
        if (count($dcvMethods) !== count($domains)) {
            return false;
        }

        foreach ($dcvMethods as $key => $method) {
            if (filter_var($domains[0], FILTER_VALIDATE_IP | FILTER_FLAG_IPV4) && !in_array($method, ['http', 'https'])) { // IP类型域名，只能使用http、https验证方式
                return false;
            }
        }

        return true;
    }

    protected function validateMax($attribute, $value, $params)
    {
        if (!isset($params[0])) {
            return false;
        }

        if (is_string($value)) {
            return strlen($value) <= $params[0];
        } else if (is_array($value)) {
            return count($value) <= $params[0];
        }

        return true;
    }

    protected function validateMin($attribute, $value, $params)
    {
        if (!isset($params[0])) {
            return false;
        }

        if (is_string($value)) {
            return strlen($value) >= $params[0];
        } else if (is_array($value)) {
            return count($value) >= $params[0];
        }

        return true;
    }


    protected function validateBetween($attribute, $value, $params)
    {
        if (!isset($params[0]) || !isset($params[1])) {
            return false;
        }

        if (is_string($value)) {
            return strlen($value) >= $params[0] && strlen($value) <= $params[1];
        } else if (is_array($value)) {
            return count($value) >= $params[0] && count($value) <= $params[1];
        }

        return true;
    }
}
