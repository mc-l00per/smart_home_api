<?php

if (!function_exists('is_good')) {
    function is_good($data): bool
    {
        if (isset($data)) {
            if (is_array($data)) {
                return $data != [] && $data != false && count($data) > 0;
            } else
                return $data != [] && $data != false && $data != 'null';
        } else return false;
    }
}

if (!function_exists('exception_to_string')) {
    function exception_to_string(Exception $exception): string
    {
        return 'Message: ' . $exception->getMessage() .
            ' -- File: ' . $exception->getFile() .
            ' -- Line: ' . $exception->getLine();
    }
}

if (!function_exists('rule_of_three_for_y')) {
    function rule_of_three_for_y(float $a, float $b, float $x): float
    {
        if ($a == 0) {
            return 0;
        }

        return round(abs(((float)$b * (float)$x) / (float)$a), 4);
    }
}

if (!function_exists('rule_of_three_for_x')) {
    function rule_of_three_for_x(float $a, float $b, float $y): float
    {
        if ($b == 0) {
            return 0;
        }

        return round(abs(((float)$a * (float)$y) / (float)$b), 4);
    }
}
