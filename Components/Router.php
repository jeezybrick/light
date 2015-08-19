<?php


class Router {

private $routes;

    public function __construct(){

        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);

    }

    //Метод для получения URI
    private function getURI(){

        //Получаем uri
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }else{
            return null;
        }

    }

    public function run(){

        $uri = $this->getURI();
        if($uri == null){
            //Подключаем нужный контроллер
            $controllerFile = ROOT. '/controllers/PagesController.php';

            if(file_exists($controllerFile)){
                include_once($controllerFile);
            }

            //Создаем обьект контроллера и вызываем его метод
            $controllerObject = new PagesController();
            $controllerObject->actionIndex();

        }

        //Проверяем наличие такого uri в роутах
        foreach($this->routes as $uriPattern => $path){

            //Проверка на совпадение введеннго uri и в роутах(#-delimiter(разделитель))
            if(preg_match("#$uriPattern#",$uri)){

                //разделяем адрес на части
                $segments = explode('/',$path);

                //Получаем имя контроллера
                $controllerName = array_shift($segments).'Controller';

                //Делаем название контроллера с большой буквы
                $controllerName = ucfirst($controllerName);

                //Получаем имя метода
                $actionName = 'action'. ucfirst(array_shift($segments));

                //Подключаем нужный контроллер
                $controllerFile = ROOT. '/controllers/' .
                    $controllerName . '.php';

                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }
              //  echo $actionName;

                //Создаем обьект контроллера и вызываем его метод
                $controllerObject = new $controllerName();
                $result = $controllerObject->$actionName();

                if($result != null){
                    break;
                }

            }
        }
    }

}