<?php


class User
{
    /*
     * Метод для проверки незалогинен ли пользователь на сайте.Возвращает данные из сессии если залогинен.
     */
    public static function checkLogged()
    {

        if (isset($_SESSION['user'])) {


            return $_SESSION['user'];

        }

        header("Location: /auth/login");
    }

    /*
 * Метод для проверки незалогинен ли пользователь на сайте.Возвращает true если залогинен.
  */
    public static function checkIfAuth()
    {

        if (isset($_SESSION['user'])) {

            return true;

        }

        return false;
    }

    /*
* Метод для выборки всех логинов из БД для angular проверки при вводе занятого логина при регистрации
 */
    public static function getListOfLogins()
    {

        $logins = [];
        $db = DB::getConnection();
        $sql = 'SELECT login FROM users';

        $result = $db->prepare($sql);
        $result->execute();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $logins[] = $row;
        }

        // print_r($logins);
        if ($logins) {
            return json_encode($logins);
        }

        return false;
    }

    /*
     * Метод для проверки соостветствия логина и пароля при заходе на сайт
     */
    public static function checkUserData($login = null, $password = null)
    {

        $db = DB::getConnection();
        $sql = 'SELECT * FROM users WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_INT);

        $result->execute();

        $user = $result->fetch();

        $pass_check = password_verify($password, $user['password']);


        if ($user && $pass_check) {
            return $user;
        }

        return false;

    }

    /*
* Метод для внесения данных пользователя в сессию при заходе на сайт
 */
    public static function postLogin($userId)
    {
        $_SESSION['user'] = $userId;

    }

    /*
* Метод для внесения данных пользователя в БД при регистрации
 */
    public static function postRegister($last_name,
                                        $first_name,
                                        $password,
                                        $login,
                                        $email,
                                        $date,
                                        $phone)
    {

        $db = DB::getConnection();
        $sql = 'INSERT INTO users (last_name,
                                   first_name,
                                   password,
                                   login,
                                   email,
                                   date,
                                   phone
                                   ) VALUES (:last_name,
                                                  :first_name,
                                                  :password,
                                                  :login,
                                                  :email,
                                                  :date,
                                                  :phone
                                             ) ';
        $result = $db->prepare($sql);
        $result->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $result->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);

        return $result->execute();

    }

    /*
* Метод для внесения изминений в данные пользователя
 */
    public static function edit($id, $last_name,
                                $first_name,
                                $password,
                                $login,
                                $email,
                                $date,
                                $phone)
    {

        $db = DB::getConnection();
        $sql = 'UPDATE users SET last_name = :last_name,
                                   first_name = :first_name,
                                   password = :password,
                                   login = :login,
                                   email = :email,
                                   date = :date,
                                   phone = :phone
                                   WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $result->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);

        return $result->execute();

    }

    /*
* Метод для выборки пользователя по id
 */
    public static function getUserById($id = null)
    {

        if ($id) {
            $db = DB::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $result->execute();

            return $result->fetch();
        }

    }

    /*
* Метод для удаления пользователя по id
   */
    public static function deleteUserById($id = null)
    {

        if ($id) {
            $db = DB::getConnection();
            $sql = 'DELETE FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            return $result->execute();
        }

    }

    /*
* Метод для проверки загружал ли пользователь аватар.Если нет-ставим дефолтный
 */
    public static function getAvatar($id = null)
    {

        $default = 'default.jpg';
        $path = '/public/images/users/avatars/';

        $pathToAvatar = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToAvatar)) {
            return $pathToAvatar;
        }

        return $path . $default;

    }

    /*
* Метод для поворота аватарки на заданное количество градусов
 */
    public static function imageRotate($filePath, $value)
    {

        $source = imagecreatefromjpeg($filePath);
        switch ($value) {
            case '0':
                $degrees = 0;
                break;
            case '1':
                $degrees = 90;
                break;
            case '2':
                $degrees = 180;
                break;
            case '3':
                $degrees = 270;
                break;
            case '4':
                $degrees = 360;
                break;
            default:
                $degrees = 0;
                break;

        }
        $rotate = imagerotate($source, $degrees, 0);

        imagejpeg($rotate, $filePath);
        imagedestroy($source);

    }

    /*
* Метод для для черно-белой автараки
 */
    public static function imageGray($filePath)
    {

        $source = imagecreatefromjpeg($filePath);
        imagefilter($source, IMG_FILTER_GRAYSCALE);
        imagejpeg($source, $filePath);
        imagedestroy($source);

    }


} 