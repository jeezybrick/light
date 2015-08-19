<?php require_once ROOT . '/views/partials/head.php';?>
    <div class="row">
        <div ng-app="testApp" ng-controller="loginCtrl" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 70px;">
        <?php if ($result): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Вы успешно вошли на сайт! Теперь вы можете <a href="/my/show">войти в личный кабинет.</a>
            </div>

        <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

            <h1>Вход пользователя</h1>

            <hr>
            <form class="form-horizontal" role="form" method="POST" action="#" name="loginForm" id="formLogin">

                <div class="form-group">
                    <label class="col-md-2 control-label">Логин</label>
                    <div class="col-md-6">
                        <input ng-model="login"  type="text"
                         class="form-control" name="login" value="<?php echo $login; ?>" required>
                        <span class="help-block" ng-show="loginForm.login.$error.required">
                                     Обязательное поле</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Пароль</label>
                    <div class="col-md-6">
                        <input ng-model="password" ng-minlength="6" ng-maxlength="16"
                               type="password" class="form-control" name="password" required>
                        <span class="help-block" ng-show="loginForm.password.$error.minlength">
                                    Минимум 6 символов</span>
                        <span class="help-block" ng-show="loginForm.password.$error.maxlength">
                                    Максимум 16 символов</span>
                                    <span class="help-block" ng-show="loginForm.password.$error.required">
                                     Обязательное поле</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Запомнить меня
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Войти!">
                    </div>
                </div>

                <div class="form-group">
                   <h4><label class="col-md-4 control-label"> <a href="/auth/register">Еще не зарегистрированы?</a></label></h4>
                </div>
            </form>
            <?php endif; ?>
        </div>

    </div>
<?php require_once ROOT . '/views/partials/footer.php';?>