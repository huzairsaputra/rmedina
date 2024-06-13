<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class StandardPassword implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $hasUppercase = (bool) preg_match('/[A-Z]/', $value);
        $hasLowercase = (bool) preg_match('/[a-z]/', $value);
        $hasNumber = (bool) preg_match('/[0-9]/', $value);
        $isString = is_string($value);
        $hasMinLength = Str::length($value) >= 8;

        return $hasLowercase && $hasUppercase && $hasNumber && $isString && $hasMinLength;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password harus minimal 8 karakter, memuat kombinasi angka, huruf kecil dan huruf besar.';
    }
}
