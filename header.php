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
	</div>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="/index.php">Acceuil</a>
		</div>
		<ul class="nav navbar-nav">
		  <li><a href="/infos_vehicule/">Infos du véhicule</a></li>
		  <li><a href="/codes_erreurs/">Codes d'erreurs</a></li>
		  <li><a href="/statistique/">Statistique</a></li>
		</ul>
	  </div>
	</nav>

	<div class="container-fluid">