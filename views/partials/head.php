<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="test">
    <meta name="author" content="Stacenko Andrey">
    <title>Light It</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/public/css/my.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="/public/css/bootstrap-datepicker.min.css">  -->
    <link rel="stylesheet" href="/public/css/animate.css">
    <link rel="stylesheet" href="/public/css/imgareaselect-default.css" />
    <style>
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

    <!--[if IE]>
    <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default <?php if ($uri == '' && !User::checkIfAuth()){echo 'animated slideInDown';}?>">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="margin-left:15px;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/my/show" class="hidden-lg hidden-md hidden-sm" style="color: black;">
                    <i class="fa fa-user fa-3x pull-right" style="margin-right:15px;margin-top:4px;"></i>
                </a>
                <?php if (User::checkIfAuth()): ?>
                    <div class="pull-right hidden-lg hidden-md hidden-sm"
                         style="padding:0;margin-right: 10px;height: 50px;width: 80px;">
                        <img src="<?php echo User::getAvatar($_SESSION['user']['id']); ?>" width="100%" height="100%"
                             alt="Avatar">
                    </div>
                <?php endif; ?>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li <?php if ($uri == '') : ?> class="active"<?php endif; ?>><a href="/">Главная</a>
                    </li>
                    <li <?php if ($uri == 'contacts') : ?> class="active"<?php endif; ?>><a
                            href="/contacts">Контакты</a>
                    </li>
                    <?php if (User::checkIfAuth()) { ?>
                        <li <?php if ($uri == 'my/show') : ?> class="active"<?php endif; ?>><a href="/my/show">Личный
                                кабинет</a>
                        </li>
                    <?php } ?>
                </ul>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (User::checkIfAuth()) : ?>
                        <li class="hidden-xs" style="width: 70px;height: 50px;">
                            <!-- <div class="col-xs-2 pull-right" style="height:50px;padding: 0;"> -->
                            <img src="<?php echo User::getAvatar($_SESSION['user']['id']); ?>" width="100%"
                                 height="100%" alt="Avatar">
                            <!--  </div>-->
                        </li>
                        <li><a href="/my/show">
                                <?php
                                echo User::checkLogged()['first_name'] . ' ' .
                                    substr(User::checkLogged()['last_name'], 0, 2) . '.';
                                ?>
                            </a>
                        </li>
                        <li><a href="/auth/logout">Выйти</a>
                        </li>
                    <?php else: ?>
                        <li <?php if ($uri == 'auth/login') { ?> class="active"<?php } ?>><a
                                href="/auth/login">Войти</a>
                        </li>
                    <?php endif ?>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
