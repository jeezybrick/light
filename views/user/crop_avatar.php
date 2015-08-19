<?php
require_once ROOT . '/views/partials/head.php';
?>



    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 70px;">

            <?php if ($result): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Аватар успешно изменен! Перейти в <a href="/my/show">личный кабинет</a> или в <a href="/my/icon">редактирование изображения</a>.
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <!--  <a href="<?php echo User::getAvatar($_SESSION['user']['id']); ?>"> -->
                    <img id="thumbnail" src="<?php echo User::getAvatar($_SESSION['user']['id']); ?>" class="img-rounded" alt="Avatar">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                        <form method="POST" action="#">
                            <input id="save_thumb" type="submit" class="btn btn-primary btn-lg" name="crop_image" value="Обрезать изображение">
                            <input type="hidden" name="x1" value="" id="x1">
                            <input type="hidden" name="y1" value="" id="y1">
                            <input type="hidden" name="w" value="" id="w">
                            <input type="hidden" name="h" value="" id="h">
                        </form>
                    </div>
                    <!-- </a>  -->
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
require_once ROOT . '/views/partials/footer.php';
?>