<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UrlRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isUrl = preg_match('/^[a-z0-9]+(?:\.([a-z0-9]+))*$/i', $value);
        if (! $isUrl) {
            $fail($attribute.' is not a valid domain');
        }
    }
}
