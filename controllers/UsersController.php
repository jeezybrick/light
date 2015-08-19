<?php


class UsersController
{

    /*
     * Экшн для странички личного кабинета
     */
    public function  actionIndex()
    {
        // echo 'User index';
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        $userId = User::checkLogged()['id'];

        $user = User::getUserById($userId);
        require_once ROOT . '/views/user/show.php';

    }

    /*
     * Экшн для редактирования своих данных пользователем
     */
    public function  actionEdit()
    {
        // echo 'User index';
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        $userId = User::checkLogged()['id'];

        $user = User::getUserById($userId);
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

            if (RegisterValidator::required(array($_POST))) {
                $errors[] = 'Все поля обязательны к запонению';

            }

            if (RegisterValidator::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов и длинее 16';

            }

            if (!RegisterValidator::checkEmail($email)) {
                $errors[] = 'Введите правильный email';

            }

            if (!strtotime($_POST['date'])) {
                $errors[] = 'Введите дату в правильном формате(год-месяц-день)';

            }

            if ($errors == false) {

                $password_new = password_hash($password, PASSWORD_DEFAULT);
                $result = User::edit($userId,
                    $last_name,
                    $first_name,
                    $password_new,
                    $login,
                    $email,
                    $date,
                    $phone
                );
                $userId = User::checkUserData($login, $password);
                User::postLogin($userId);

            }

        }

        require_once ROOT . '/views/user/edit.php';

    }

    /*
     * Экшн для удаления пользователя
     */
    public function actionDelete()
    {

        $userId = User::checkLogged()['id'];
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/public/images/users/avatars/' . $userId . '.jpg';

        User::deleteUserById($userId);
        unset($_SESSION['user']);
        if (file_exists($filePath)) {
            unlink($filePath);
            clearstatcache();
        }

        header("Location: /");

    }

    /*
     * Экшн для загрузки,поворота и задания автарки черно-белой
     */
    public function actionEditAvatar()
    {

        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $userId = User::checkLogged()['id'];
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/public/images/users/avatars/' . $userId . '.jpg';
        $result = false;

        if (isset($_POST['submit'])) {

            if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                $errors = false;
                if (!ImageValidator::сheckSize()) {
                    $errors[] = 'Слишком большой размер файла';
                }

                if (!ImageValidator::сheckType()) {
                    $errors[] = 'Тип картинки может быть только .jpg';
                }

                if ($errors == false) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $filePath);
                    if (isset($_POST['rotate'])) {
                        User::imageRotate($filePath, $_POST['rotate']);
                    }

                    if (isset($_POST['grayscale'])) {
                        User::imageGray($filePath, $_POST['rotate']);
                    }
                    $result = true;
                    // header("Location: /");
                }

            }
        }


        require_once ROOT . '/views/user/edit_avatar.php';

    }

    /*
     * Экшн для обрезки аватарки пользователя
     */

    public function actionCropAvatar()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $userId = User::checkLogged()['id'];
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/public/images/users/avatars/' . $userId . '.jpg';
        if (!file_exists($filePath)) {
            $errors[] = 'Вы еще не загружали аватар';
        }
        $result = false;

        if (isset($_POST["crop_image"])) {
            $errors = false;
            if (empty($_POST["x1"]) || empty($_POST["y1"]) || empty($_POST["w"]) || empty($_POST["h"])) {
                $errors[] = 'Вы не выбрали зону обрезки';
            }
            if (!file_exists($filePath)) {
                $errors[] = 'Вы еще не загружали аватар';
            }

            if ($errors == false) {
                $source = imagecreatefromjpeg($filePath);
                $x1 = $_POST["x1"];
                $y1 = $_POST["y1"];
                $w = $_POST["w"];
                $h = $_POST["h"];


                $cropped = imagecrop($source, array('x' => $x1, 'y' => $y1, 'width' => $w, 'height' => $h));
                imagejpeg($cropped, $filePath);
                $result = true;
            }
        }


        require_once ROOT . '/views/user/crop_avatar.php';

    }

} 