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

                <h1>Оставить отзыв</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li class="active">Контакты</li>
                </ol>
                <hr>
                <form class="form-horizontal" role="form" method="POST" action="#">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Ваш E-Mail *</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email"
                                   value="<?php echo $userEmailAddress; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Ваше сообщение *</label>

                        <div class="col-md-6">
                            <textarea class="form-control"
                                      name="message" rows="3" value="<?php echo $userMessage; ?>" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2 text-center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Отправить">
                        </div>
                    </div>
                </form>

            <?php endif; ?>
        </div>
    </div>
<?php
require_once ROOT . '/views/partials/footer.php';
?>