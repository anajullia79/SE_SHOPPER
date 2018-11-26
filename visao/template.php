<!-- head -->
<html lang="en">
<head>
    <title>E-Shop</title>
    <base href="<?= BASE_URL ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link href="./publico/css/bootstrap.min.css" rel="stylesheet">
    <link href="./publico/css/font-awesome.min.css" rel="stylesheet">
    <link href="./publico/css/prettyPhoto.css" rel="stylesheet">
    <link href="./publico/css/price-range.css" rel="stylesheet">
    <link href="./publico/css/animate.css" rel="stylesheet">
	<link href="./publico/css/main.css" rel="stylesheet">
	<link href="./publico/css/responsive.css" rel="stylesheet">
      
    <link rel="shortcut icon" href="./publico/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./publico/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./publico/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./publico/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./publico/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <?php require "./visao/cabecalho.php"; ?>

    <?php alertComponentRender(); ?>

    <main class="container">
         <?php require $viewFilePath; ?>
    </main>
    
    <?php require "visao/rodape.php"; ?>

    <script src="./publico/js/jquery.js"></script>
    <script src="./publico/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="./publico/js/gmaps.js"></script>
    <script src="./publico/js/contact.js"></script>
    <script src="./publico/js/price-range.js"></script>
    <script src="./publico/js/jquery.scrollUp.min.js"></script>
    <script src="./publico/js/jquery.prettyPhoto.js"></script>
    <script src="./publico/js/main.js"></script>
</body>
</html>