<!DOCTYPE html>
<html class="bg-primary">
<head>
    <title><?php echo $this->page_title ?></title>
    <meta charset="UTF-8">
        <!-- bootstrap 3.0.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Theme style -->
    <link href="assets/theme/theme.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
        <!-- Google font Signika -->
    <link href='http://fonts.googleapis.com/css?family=Signika+Negative' rel='stylesheet' type='text/css'>

    <meta charset="UTF-8">

    <!-- bootstrap 3.0.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link href="assets/theme/theme.css" rel="stylesheet" />
    <!-- Google font Signika -->
    <link href='http://fonts.googleapis.com/css?family=Signika+Negative' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        window.onload = function()
        {
            timedHide(document.getElementById('autovanish'), 5);
        }

        function timedHide(element, seconds)
        {
            if (element) {
                setTimeout(function() {
                    element.style.display = 'none';
                }, seconds*1000);
            }
        }
    </script>
</head>
<body class="bg-primary">
<div class="row">
    <div class="valign col-md-4 col-md-offset-4 col-sm-5 col-sm-offset-4 col-xs-12">
        <h1 class="text-center signika"><i class="fa fa-shield"></i> AdminLTE</h1>
    </div>
</div>

<div class="wrapper container" style="max-width: 500px">

    <section class="content-header">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger" id="autovanish">
                <?php echo $this->error; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
<!--                <div class="alert alert-danger">Lỗi validate</div>-->
<!--                <p class="alert alert-success">Thành công</p>-->
    </section>

    <?php echo $this->content; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
</body>


</html>
