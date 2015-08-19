<?php
require_once ROOT . '/views/partials/head.php';
?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 70px;">
            <?php if ($result): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Данные успешно изменены!
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

                <h1>Редактирование профиля</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/my/show">Личный кабинет</a></li>
                    <li class="active">Редактирование профиля</li>
                </ol>
                <hr>
                <form class="form-horizontal" role="form" method="POST" action="#">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Фамилия *</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                   name="last_name" value="<?php echo $user['last_name']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Имя *</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                   name="first_name" value="<?php echo $user['first_name']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Логин *</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                   name="login" value="<?php echo $user['login']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Пароль* </label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">E-Mail *</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email"
                                   value="<?php echo $user['email']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Дата рождения *</label>
                        <div class="col-md-6">
                            <input ng-model="date" type="text" class="form-control date" name="date" value="<?php echo $user['date']; ?>" placeholder="гггг-мм-дд" required style="width: 300px">
                            <span class="help-block" ng-show="regForm.date.$error.required">
                               Обязательное поле</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Телефон *</label>
                        <div class="col-md-1">
                            <input ng-model="phone" type="text" class="form-control phone" name="phone"
                                   value="<?php echo $user['phone']; ?>" placeholder="***-*******" required style="width: 300px">
                        <span class="help-block" ng-show="regForm.phone.$error.required">
                               Обязательное поле</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2 text-center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Редактировать">
                        </div>
                    </div>
                </form>

            <?php endif; ?>
        </div>
    </div>
<?php
require_once ROOT . '/views/partials/footer.php';
?>