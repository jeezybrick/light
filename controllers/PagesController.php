<?php


class PagesController
{

    /*
     * Экшн для главной странички
     */
    public function actionIndex()
    {

        $uri = trim($_SERVER['REQUEST_URI'], '/');

        if(User::checkIfAuth()){
            $userId = User::checkLogged()['id'];

            $userInfo = User::getUserById($userId);
        }

        require_once ROOT . '/views/index.php';


    }

    /*
    * Экшн для страницы 'Контакты'
    */
    public function actionContacts()
    {

        $uri = trim($_SERVER['REQUEST_URI'], '/');

        $userEmailAddress = '';
        $userMessage = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmailAddress = $_POST['email'];
            $userMessage = $_POST['message'];

            $errors = false;

            if (!RegisterValidator::checkEmail($userEmailAddress)) {
                $errors[] = 'Введите правильный email';

            }

            if ($errors == false) {

                $adminEmail = 'smooker14@gmail.com';
                $subject = 'Новый отзыв';
                $message = 'Отзыв от ' . $userEmailAddress . ": " . $userMessage;

                mail($adminEmail, $subject, $message);

            }
        }

        require_once ROOT . '/views/contacts.php';


    }

} 