<?php

//use Validators\RegisterValidator;

class AuthController
{
    /*
    * Экшн для логина пользователя на сайт
    */
    public function actionLogin()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $login = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            if (RegisterValidator::required(array($_POST))) {
                $errors[] = 'Все поля обязательны к запонению';

            }

            if (RegisterValidator::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов и длинее 16';

            }

            $userId = User::checkUserData($login, $password);

            if ($userId == false) {

                $errors[] = 'Введены неправильные данные';

            } else {

                User::postLogin($userId);
                $result = true;

                //header("Location: /");
            }

        }

        require_once ROOT . '/views/auth/login.php';

    }

    /*
   * Экшн для регистрации пользователя на сайт
   */
    public function actionRegister()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $errors = false;
        $result = false;
        $last_name = '';
        $first_name = '';
        $login = '';
        $email = '';
        $date = '';
        $phone = '';

        if (isset($_POST['submit'])) {

            $last_name = $_POST['last_name'];
            $first_name = $_POST['first_name'];
            $password = $_POST['password'];
            $login = $_POST['login'];
            $email = $_POST['email'];
            $date = date("Y-m-d", strtotime($_POST['date']));
            $phone = $_POST['phone'];

            /*
             * Валидация данных
            */
            if (RegisterValidator::required(array($_POST))) {
                $errors[] = 'Все поля обязательны к запонению';

            }

            if (RegisterValidator::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов и длинее 16';

            }

            if (RegisterValidator::checkLogin($login)) {
                $errors[] = 'Такой логин уже существует';

            }

            if (!RegisterValidator::checkEmail($email)) {
                $errors[] = 'Введите правильный email';

            }

            if (RegisterValidator::checkEmailExists($email)) {
                $errors[] = 'Такой email уже существует';

            }

            if (!strtotime($_POST['date'])) {
                $errors[] = 'Введите дату в правильном формате(год-месяц-день)';

            }

            if ($errors == false) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $result = User::postRegister(
                    $last_name,
                    $first_name,
                    $password,
                    $login,
                    $email,
                    $date,
                    $phone
                );

            }

        }

        require_once ROOT . '/views/auth/register.php';

    }

    /*
   * Экшн для выхода из сайта
   */
    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }

    /*
   * Экшн для получения всех логинов из БД для Angular
   */
    public function actionLoginList()
    {

        echo User::getListOfLogins();

    }

}