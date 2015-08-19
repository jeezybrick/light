<?php
require_once ROOT . '/views/partials/head.php';
?>



    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 70px;">

            <?php if ($result): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Аватар успешно загружен! Перейти в <a href="/my/show">личный кабинет</a> или в <a href="/my/icon">редактирование изображения</a>.
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

                <h1>Загрузка аватара</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/my/show">Личный кабинет</a></li>
                    <li class="active">Загрузка аватара</li>
                </ol>
                <hr>
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-6">
                    <!--  <a href="<?php echo User::getAvatar($_SESSION['user']['id']); ?>"> -->
                        <img src="<?php echo User::getAvatar($_SESSION['user']['id']); ?>" class="img-rounded img-responsive" alt="Avatar">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top:20px;">
                     <h4>Вы также можете <a href="/icon/crop"> обрезать изображение</a>.</h4>
                    </div>

                    <!-- </a>  -->
                </div>
                <div class="col-lg-8 col-md-7 col-sm-6 col-xs-6">
                    <form class="form-horizontal" role="form" method="POST" action="#" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Загрузить аватар</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control"
                                       name="avatar" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Повернуть изображение</label>
                            <div class="col-md-6">
                                    <select class="form-control" name="rotate">
                                        <option value="0">0&#176</option>
                                        <option value="1">90&#176</option>
                                        <option value="2">180&#176</option>
                                        <option value="3">270&#176</option>
                                        <option value="4">360&#176</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="grayscale"> Сделать чёрно-белым
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2 text-center">
                                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Загрузить">
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
require_once ROOT . '/views/partials/footer.php';
?>