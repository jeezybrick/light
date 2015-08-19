<?php


class RegisterValidator extends Validator
{

    /*
    * Метод для проверки авторизации пользователя
    */
    public static function checkLogin($login)
    {

        $db = DB::getConnection();
        $sql = 'SELECT COUNT(*) FROM users WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }

        return false;
    }

    /*
    * Метод для проверки существующего email в БД
    */
    public static function checkEmailExists($email)
    {

        $db = DB::getConnection();
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }

        return false;
    }

    /*
    * Метод для проверки длины пароля
    */
    public static function checkPassword($password)
    {

        if (strlen($password) < 6 or strlen($password) > 16) {
            return true;
        }
        return false;
    }

    /*
    * Метод для валидации вводимого email
    */
    public static function checkEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

} 