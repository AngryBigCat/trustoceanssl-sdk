<?php

namespace TrustOceanSSL\Validation\Concerns;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use TrustOceanSSL\Support\Domain;

// use Pdp\Domain;

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

    protected function validateDomains($attribute, $domains)
    {
        if (!is_array($domains)) {
            return false;
        }

        foreach ($domains as $domain) {
            if (!$this->validateDomain($attribute, $domain)) {
                return false;
            }
        }

        return true;
    }

    protected function validateDistinct($attribute, $domains)
    {
        $distinctDomains = array_values(array_unique($domains));
        if (count($domains) !== count($distinctDomains)) {
            return false;
        }

        return true;
    }

    protected function validateDomain($attribute, $domain)
    {
        if (filter_var($domain, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return false;
        }

        $result = Domain::parse($domain);

        // 检查是否为IDN域名
        if ($result->toAscii()->toString() !== $result->domain()->toString()) {
            return false;
        }

        // 域名不能包含有大写字母
        if (preg_match('/[A-Z]/', $result->domain()->toString())) {
            return false;
        }

        // 域名长度不能大于63位
        if (strlen($result->domain()->toString()) > 63) {
            return false;
        }

        return $result->suffix()->isKnown();
    }

    protected function validateCsr($attribute, $value)
    {
        $csrData = openssl_csr_get_subject($value);

        if (!isset($csrData['CN']) || filter_var($csrData['CN'], FILTER_VALIDATE_IP)) {
            return false;
        }

        return !is_null($csrData);
    }

    protected function validateDcvMethods($attribute, $dcvMethods)
    {
        if (!is_array($dcvMethods)) {
            return false;
        }

        foreach ($dcvMethods as $dcvMethod) {
            if (!$this->validateDcvMethod($attribute, $dcvMethod)) {
                return false;
            }
        }

        return true;
    }

    protected function validateDcvMethod($attribute, $dcvMethod)
    {
        if (strpos($dcvMethod, '@') === false) {
            if (!in_array($dcvMethod, ['dns', 'http', 'https'])) {
                return false;
            }
        } else {
            if (!$this->validateEmail($attribute, $dcvMethod)) {
                return false;
            }
        }

        return true;
    }

    protected function validateSize($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'size');

        if (!is_numeric($parameters[0]) && is_string($parameters[0])) {
            $targetName = $parameters[0];
            if (!array_key_exists($targetName, $this->data)) {
                return false;
            }

            if (gettype($this->data[$targetName]) !== gettype($value)) {
                return false;
            }

            if (is_array($value)) {
                return count($this->data[$targetName]) === count($value);
            } elseif (is_string($value)) {
                return strlen($this->data[$targetName]) === strlen($value);
            } else {
                return false;
            }
        }

        return false;
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

    protected function validateDate($attribute, $value)
    {
        if ($value instanceof \DateTimeInterface) {
            return true;
        }

        if ((! is_string($value) && ! is_numeric($value)) || strtotime($value) === false) {
            return false;
        }

        $date = date_parse($value);

        return checkdate($date['month'], $date['day'], $date['year']);
    }

    protected function validateDateFormat($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'date_format');

        if (! is_string($value) && ! is_numeric($value)) {
            return false;
        }

        $format = $parameters[0];

        $date = \DateTime::createFromFormat('!'.$format, $value);

        return $date && $date->format($format) == $value;
    }

    public function requireParameterCount($count, $parameters, $rule)
    {
        if (count($parameters) < $count) {
            throw new \InvalidArgumentException("Validation rule $rule requires at least $count parameters.");
        }
    }

    /**
     * Validate that an attribute is an array.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  array  $parameters
     * @return bool
     */
    public function validateArray($attribute, $value, $parameters = [])
    {
        if (!is_array($value)) {
            return false;
        }

        if (empty($parameters)) {
            return true;
        }

        return empty(array_diff_key($value, array_fill_keys($parameters, '')));
    }
}
