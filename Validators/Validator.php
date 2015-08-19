<?php


abstract class Validator
{

    public static function required($arr)
    {

        foreach ($arr as $value) {
            foreach ($value as $elements) {
                if (strlen($elements) <= 0) {

                    return true;
                    break;
                }
            }

        }
        return false;
    }

} 