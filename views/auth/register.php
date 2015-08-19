<?php
require_once ROOT . '/views/partials/head.php';
?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 70px;">
            <?php if ($result): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Вы успешно зарегистрированы!Теперь вы можете <a href="/auth/login">войти на сайт.</a>
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

                <h1>Регистрация</h1>
                <hr>
                <form ng-app="testApp" ng-controller="registrationCtrl" class="form-horizontal"
                      name="regForm" role="form" method="POST" action="#"
                      id="formRegistration">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Фамилия *</label>

                        <div class="col-md-6">
                            <input ng-model="lastName" type="text" class="form-control"
                                   name="last_name" value="<?php echo $last_name; ?>">
                          <span class="help-block" ng-show="regForm.last_name.$error.required" required>
                                     Обязательное поле</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Имя *</label>

                        <div class="col-md-6">
                            <input ng-model="firstName" type="text" class="form-control"
                                   name="first_name" value="<?php echo $first_name; ?>" required>
                        <span class="help-block" ng-show="regForm.first_name.$error.required">
                                     Обязательное поле</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Логин *</label>

                        <div class="col-md-6">
                            <input ng-model="login" ng-change="check()" type="text" class="form-control"
                                   name="login" value="<?php echo $login; ?>" required>
                        <span class="help-block" ng-show="regForm.login.$error.required">
                                     Обязательное поле</span>
                        <span class="help-block" ng-show="loginExist">
                                     Такой логин уже существует</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Пароль* </label>

                        <div class="col-md-6">
                            <input ng-model="password" ng-minlength="6" ng-maxlength="16"
                                   type="password" class="form-control" name="password" required>
                        <span class="help-block" ng-show="regForm.password.$error.minlength">
                                    Минимум 6 символов</span>
                        <span class="help-block" ng-show="regForm.password.$error.maxlength">
                                    Максимум 16 символов</span>
                                    <span class="help-block" ng-show="regForm.password.$error.required">
                                     Обязательное поле</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">E-Mail *</label>

                        <div class="col-md-6">
                            <input ng-model="email" type="email" class="form-control" name="email"
                                   value="<?php echo $email; ?>" required>
                         <span class="help-block" ng-show="regForm.email.$error.required">
                               Обязательное поле</span>
                       <span class="help-block" ng-show="regForm.email.$error.email">
                               Введите правильный email</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Дата рождения *</label>

                        <div class="col-md-6">
                            <input ng-model="date" type="text" class="form-control date" name="date" value="<?php echo $date; ?>" placeholder="гггг-мм-дд" required style="width: 300px">
                            <span class="help-block" ng-show="regForm.date.$error.required">
                               Обязательное поле</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Телефон *</label>

                        <div class="col-md-1">
                            <input ng-model="phone" type="text" class="form-control phone" name="phone"
                                   value="<?php echo $phone; ?>" placeholder="***-*******" required style="width: 300px">
                        <span class="help-block" ng-show="regForm.phone.$error.required">
                               Обязательное поле</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Капча</label>

                        <!--  <div class="col-md-1">
                            <div class="g-recaptcha" data-sitekey="6LdaAgsTAAAAAInJM9IZckHwfTaPuKiJRxHVds1x"></div>
                          </div>-->
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2 text-center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Зарегистрироваться">
                        </div>
                    </div>
                </form>

            <?php endif; ?>
        </div>
    </div>
<?php
require_once ROOT . '/views/partials/footer.php';
?>