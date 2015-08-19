<?php
require_once ROOT . '/views/partials/head.php';
?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 70px;">
            <h1>Личный кабинет</h1>
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Личный кабинет</li>
            </ol>
            <hr>
            <h1>
                <small>Привет,<?php echo $user['first_name'] . ' !'; ?></small>
            </h1>
            <div class="list-group col-lg-3 col-md-4 col-sm-5">
                <a href="/my/edit" class="list-group-item">Редактировать личные данные</a>
                <a href="/my/icon" class="list-group-item">Изменить аватар</a>
                <a href="/my/delete" class="list-group-item list-group-item-danger"
                   onclick="return confirm('Вы уверены,что хотите удалить свой аккаунт?')">Удалить аккаут</a>
            </div>
        </div>
    </div>
<?php
require_once ROOT . '/views/partials/footer.php';
?>