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
