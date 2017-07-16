<!DOCTYPE html>
<html lang="en ">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo htmlspecialchars($titulo); ?></title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url->Css('waiter.css'); ?>">
    <link rel="stylesheet" href="<?php echo $url->Css('cocinero.css'); ?>">
    <link rel="stylesheet" href="<?php echo $url->Css('iconos.css'); ?>">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>



    </style>
  </head>
  <body>
  
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-brand">
            <a href="<?php echo $url->UrlBase(); ?>app/administrador/" class="navbar-brand"><img src="<?php echo $url->Img('logo.png'); ?>" width="150px"/></a>
          </div>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo $url->UrlBase('app/administrador/'); ?>"><span class="im im-icon-Home"></span> Inicio</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="im im-icon-User"></span> Usuario <span class="im im-icon-Arrow-Down"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $url->UrlBase('usuario/crear/'); ?>"><span class="im im-icon-Add-User"></span> Crear Usuario</a></li>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo $url->UrlBase(); ?>usuario/cerrar/"><span class="im im-icon-Warning-Window"></span> Cerrar Sesi&oacute;n <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
