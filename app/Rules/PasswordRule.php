<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (
            strlen($value) < 8 ||
            !preg_match('/[a-zA-Z]/', $value) ||
            !preg_match('/[0-9]/', $value) ||
            !preg_match('/[A-Z]/', $value) ||
            !preg_match('/[a-z]/', $value) ||
            !preg_match('/[^a-zA-Z0-9]/', $value)
        ) {
            $fail('A :attribute deve possuir no mínimo 8 caracteres, e conter letras maiúsculas, minusculas, números e símbolos.');
        }
    }
}
