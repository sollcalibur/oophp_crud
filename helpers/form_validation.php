<?php
class FormValidation
{

    public static function validate($input, $validation, $minLength, $maxLength)
    {
        $str_length = strlen($input);
        if ($str_length <= $maxLength && $str_length >= $minLength) {
            switch ($validation) {
                case Constants::ALPHA:
                    return self::hardValidateAlpha($input);
                    break;
                case Constants::NUMERIC:
                    return self::hardValidateNumeric($input);
                    break;
                case Constants::EMAIL:
                    return self::hardValidateEmail($input);
                    break;
                default:
                    return TRUE;
            }
        }
    }

    private static function hardValidateAlpha($input)
    {
        if (!preg_match(Constants::REGEX_NAME, $input)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private static function hardValidateNumeric($input)
    {
        if (!preg_match(Constants::REGEX_NUMERIC, $input)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private static function hardValidateEmail($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
