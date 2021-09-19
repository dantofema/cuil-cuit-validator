<?php

namespace Dantofema\CuilValidator;

class Validator
{

    public static function validate (string $cuil): bool
    {
        $cuil_nro = self::cuitNumber($cuil);

        if (self::length($cuil_nro))
        {
            return false;
        }

        return self::check($cuil_nro) == $cuil_nro[10];
    }

    private static function cuitNumber (string $cuil): string|array|null
    {
        return preg_replace('/[^0-9]/', '', $cuil);
    }

    private static function length (string $cuil_nro): bool
    {
        return strlen($cuil_nro) != 11;
    }

    private static function check (string $cuil_nro): int|float
    {
        $x = 0;
        $resultado = 0;
        $codes = "6789456789";
        while ($x < 10)
        {
            $digitoValidador = intVal(substr($codes, $x, 1));
            $digito = intVal(substr($cuil_nro, $x, 1));
            $digitoValidacion = $digitoValidador * $digito;
            $resultado += $digitoValidacion;
            $x++;
        }
        return intVal($resultado) % 11;
    }

}