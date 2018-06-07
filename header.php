<?php
      // On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
      $page = $_SERVER['REQUEST_URI'];
      $page = str_replace("/siteyetistudio/", "",$page);
	  require "connexion_bdd.php";
	  
	  $nbUpperDirectories = substr_count(getcwd(), '/') - 3;
	  $rootDirectory = '';
	  for($i=0; $i<$nbUpperDirectories;$i++){
		  $rootDirectory .= '../';
	  }
?>

<!DOCTYPE HTML>
<html lang="fr">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link href="<?php echo $rootDirectory;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $rootDirectory;?>css/temp.css" rel="stylesheet">
	<link href="<?php echo $rootDirectory;?>css/speed.css" rel="stylesheet">
	<link href="<?php echo $rootDirectory;?>css/gauge.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="<?php echo $rootDirectory;?>infos_vehicule/gauge.php"></script>
	<script type="text/javascript" src="<?php echo $rootDirectory;?>infos_vehicule/lambda.php"></script>
	<script type="text/javascript" src="<?php echo $rootDirectory;?>infos_vehicule/temp.php"></script>
	<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<script src="<?php echo $rootDirectory;?>Chart.js-2.7.1/dist/Chart.bundle.js"></script>
    <script src="<?php echo $rootDirectory;?>Chart.js-2.7.1/samples/utils.js"></script>	
  </head>

  <body>
    <div class="container-fluid">
      <header class="row col-sm-12">
        <div class="page-header">
          <h1>Tableau de bord OBD<img src="<?php echo $rootDirectory;?>images/logo_car.png" class="pull-right"></h1>
        </div>
      </header>
      <div class="row col-sm-12">
        <nav class="col-sm-2">          
          <ul class="nav nav-pills nav-stacked">
            <li <?php if($page == "/index.php"){echo 'class="active"';} ?>> <a href="/index.php"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
            <li <?php if($page == "/infos_vehicule/"){echo 'class="active"';} ?>> <a href="/infos_vehicule/"> <span class="glyphicon glyphicon-info-sign"></span> Infos du véhicule </a> </li>
            <li <?php if($page == "/codes_erreurs/"){echo 'class="active"';} ?>> <a href="/codes_erreurs/"> <span class="glyphicon glyphicon-wrench"></span> Codes d'erreurs </a> </li>
            <li <?php if($page == "/statistique/"){echo 'class="active"';} ?>> <a href="/statistique/"> <span class="glyphicon glyphicon-stats"></span> Statistique </a> </li>
          </ul>
        </nav>