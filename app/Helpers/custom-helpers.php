<?php

if (!function_exists('format_document')) {

    function format_document($value, $type)
    {
        $CPF_LENGTH = 11;
        $cpf = preg_replace("/\D/", '', $value);

        if (strlen($cpf) === $CPF_LENGTH && $type == 1) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
        }
        return $value;
    }
}

if (!function_exists('format_phone')) {

    function format_phone($value)
    {
        $PHONE_LENGTH = 11;
        $phone = preg_replace("/\D/", '', $value);

        if (strlen($phone) === $PHONE_LENGTH) {
            return preg_replace("/(\d{2})(\d{5})(\d{4})/", "($1)$2-$3", $phone);
        }

        return $value;
    }
}
