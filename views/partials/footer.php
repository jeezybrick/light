<?php
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-lg-12">
    <div class="navbar-fixed-bottom  navbar-inverse container <?php if ($uri == '' && !User::checkIfAuth()){echo 'animated slideInUp';}?>" style="min-height: 50px;padding: 0;">
        <div class="text-center" style="margin: 20px;">
            <a class="navbar-brand" href="#" style="float: none;">footer</a>
        </div>
    </div>
</div>

<!-- End of container -->
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script src="/public/js/myAngular.js"></script>
<!-- <script src="/public/js/bootstrap-datepicker.min.js"></script> -->
<script src="/public/js/jquery.imgareaselect.pack.js"></script>
<script src="/public/js/jquery.mask.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--
<script>
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        startDate: '-3d'
    })
</script>
-->
<script>
    $('.phone').mask('000-0000000');
    $('.date').mask('0000-00-00');
</script>

<script>

    function preview(img, selection) {
        if (!selection.width || !selection.height)
            return;

        var scaleX = 100 / selection.width;
        var scaleY = 100 / selection.height;

        $('#preview img').css({
            width: Math.round(scaleX * 300),
            height: Math.round(scaleY * 300),
            marginLeft: -Math.round(scaleX * selection.x1),
            marginTop: -Math.round(scaleY * selection.y1)
        });

        $('#x1').val(selection.x1);
        $('#y1').val(selection.y1);
        $('#x2').val(selection.x2);
        $('#y2').val(selection.y2);
        $('#w').val(selection.width);
        $('#h').val(selection.height);
    }

    $(function () {
        $('#thumbnail').imgAreaSelect({ aspectRatio: '1:1', handles: true,
            fadeSpeed: 200, onSelectChange: preview });
    });


</script>
</body>

</html>