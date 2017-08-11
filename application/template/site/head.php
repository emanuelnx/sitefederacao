<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$tituloPagina?></title>
    <meta name="description" content="Federação de Kikboxe do estado do Piauí.">
    <meta name="keywords" content="federacao, luta, kikboxe, paui">
    <meta name="author" content="Emanoel Nogueira e Davi Samuel utilizando template de ThemeForces.Com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?=IMAGENS?>favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?=IMAGENS?>apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=IMAGENS?>apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=IMAGENS?>apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="<?=asset_url()?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=FONTS?>font-awesome/css/font-awesome.css">

    <!-- Nivo Lightbox
    ================================================== -->
    <link rel="stylesheet" href="<?=asset_url()?>css/nivo-lightbox.css" >
    <link rel="stylesheet" href="<?=asset_url()?>css/nivo_lightbox_themes/default/default.css">

    <!-- Slider
    ================================================== -->
    <link href="<?=asset_url()?>css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="<?=asset_url()?>css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="<?=asset_url()?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=asset_url()?>css/responsive.css">

    <!-- Google Fonts
    ================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="<?=JS?>modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php 
        assetsCss('css',$assets);
        assetsJs($assets,'head');
    ?>
</head>