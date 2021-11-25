<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AbnValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->isValidAbn($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ABN number you entered is invalid.';
    }

    /**
     * Validate an Australian Business Number (ABN)
     * @param string $abn
     * @link http://www.ato.gov.au/businesses/content.asp?doc=/content/13187.htm
     * @return bool True if $abn is a valid ABN, false otherwise
     *
     * Author : https://github.com/adamroyle/abn-validator/blob/master/src/AbnValidator.php
     *
     *
     */
    private function isValidAbn($abn) {
        $weights = array(10, 1, 3, 5, 7, 9, 11, 13, 15, 17, 19);

        // Strip non-numbers from the acn
        $abn = preg_replace('/[^0-9]/', '', $abn);

        // Check abn is 11 chars long
        if(strlen($abn) != 11) {
            return false;
        }

        // Subtract one from first digit
        $abn[0] = ((int)$abn[0] - 1);

        // Sum the products
        $sum = 0;
        foreach(str_split($abn) as $key => $digit) {
            $sum += ($digit * $weights[$key]);
        }

        if(($sum % 89) != 0) {
            return false;
        }

        return true;
    }
}
