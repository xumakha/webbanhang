

<head>
    <title><?php echo $this->page_title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link href="assets/css/theme.css" media="screen" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,500,700|Varela+Round" type="text/css" title="Google Fonts" />
    <!-- end of generated link tags -->
    <?php require_once 'views/layouts/header.php'?>
    <div class="lte-main-content">

            <?php echo $this->content; ?>

    </div>
    <?php require_once 'helpers/PaginationTest.php'?>
    <?php require_once 'views/layouts/footer.php'?>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/api.usd.js?v=1"></script>
<script src="assets/js/theme.js?v=1"></script>
<script src="assets/js/script.js?v=1"></script>

