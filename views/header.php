<?php
// session_start();
if($_SESSION['con']==1){

echo '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<style>
		.aligning{
	  	float: right;
	  	display: inline-block;
		}

		.ech1{
			display: inline-block;
		}

	
		.color1{
			background-color: #DFDFDE;
		}

		#id1{
			width : 70%;
		}		

	</style>

	<title></title>

</head>
<body>

<div class="m-3">
	<h2 class=" text-start ech1 m-1">Gestion des abscences</h2>
	<a class = "btn btn-danger aligning m-2" href="../controllers/connexion.php?gg=">se déconnecter</a>
	<p class="aligning ech1 m-3 ">Vous étes connectes  <strong>'.$_SESSION['access'].'</strong></p>

</div>

<ul class="nav nav-pills justify-content-center m-5 color1 rounded">
  <li class="nav-item">
    <a class="nav-link btn btn-info"  href="#"><strong>Administration</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-primary" href="../controllers/AdminDashboardController.php?submit=submit&choix=etudiant"><strong>page principale</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-secondary" href="../controllers/AdminDashboardController.php?redirect=insertForm"><strong>créer compte/module/salle/seance</strong></a>
  </li>
  <!--<li class="nav-item">
  <a class="nav-link" href="../controllers/AdminDashboardController.php?redirect=statistic"><strong>statistiques</strong></a>
</li>-->
 
</ul>';
	}

else{
header('Location:loginView.php?access=');
}