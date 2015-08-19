<?php


class ImageValidator extends Validator
{

    /*
    * Метод для проверки размера аватарки
    */
    public static function сheckSize()
    {
        //50mb максимум
        $max_file_size = 50;

        if ($_FILES['avatar']['size'] > $max_file_size * 1024 * 1024) {
            return false;
        }

        return true;

    }

    /*
    * Метод для проверки типа изображения
    */
    public static function сheckType()
    {

        if ($_FILES['avatar']['type'] != 'image/jpeg') {
            return false;
        }

        return true;

    }

} 