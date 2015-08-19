<?php
require_once ROOT . '/views/partials/head.php';
?>

<?php if (User::checkIfAuth()): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 70px;">
            <div id="avatar_on_index" class="col-lg-3 col-md-4 col-sm-5 hidden-xs">
                <img src="<?php echo User::getAvatar($_SESSION['user']['id']); ?>"
                     class="img-rounded img-responsive" alt="Avatar">
            </div>
            <div class="col-lg-5 col-md-8 col-sm-7 col-xs-12">
                <h2 style="margin-top: 0">
                    <?php echo $userInfo['last_name'] . ' ' . $userInfo['first_name']; ?>
                </h2>

                <div class="row">
                    <div class="user_info_block col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
                            <h3>
                                <small>Ваш логин:</small>
                            </h3>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                            <h3>
                                <small><?php echo $userInfo['login']; ?></small>
                            </h3>
                        </div>
                    </div>

                    <div class="user_info_block col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
                            <h3>
                                <small>Email:</small>
                            </h3>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                            <h3>
                                <small><?php echo $userInfo['email']; ?></small>
                            </h3>
                        </div>
                    </div>

                    <div class="user_info_block col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
                            <h3>
                                <small>Телефон:</small>
                            </h3>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                            <h3>
                                <small><?php echo $userInfo['phone']; ?></small>
                            </h3>
                        </div>
                    </div>

                    <div class="user_info_block col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
                            <h3>
                                <small>Дата рождения:</small>
                            </h3>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                            <h3>
                                <small><?php echo date("F jS, Y", strtotime($userInfo['date'])); ?></small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="starter-template animated zoomIn">
            <p class="lead">Добро пожаловать!<br>
                <a href="/auth/register">Зарегистрируйтесь</a> или <a href="/auth/login"> войдите</a> на сайт.
            </p>
        </div>
    </div>
<?php endif ?>

<?php
require_once ROOT . '/views/partials/footer.php';
?>