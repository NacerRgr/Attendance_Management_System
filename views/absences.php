<?php
session_start();
 ?>
	<?php
	if($_SESSION['con']==1)
	{
	 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste d'absences </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<style>
	.div11{
		height: 12%;
		width : 69%;
		margin-left : auto ;
		margin-right : auto ;
		margin-top : 1%;
	}
	body{
		background-color: #eee;	}

	.div2{
		margin-top : -2%;
		margin-left : auto ;
		margin-right : auto ;
		width : 70%;
	}
	a{
		text-decoration : none;
		color : black;
		font-family : 
	}
	table {
  border-collapse: collapse;
  border-radius: 0.2em;
  overflow: hidden;
}
	.size{
		width : 34%;
	}
	.m{
		margin-top : 5px;
	}
	.hr{
		width : 60%;
		margin-left : auto;
		margin-right : auto;
	}

	.custom{
		margin-top : 1%;
	}
	.c11{
		width : 50%;
	}

</style>
</head>
<body>
<div class="div11 d-flex justify-content-between align-items-center shadow-lg p-3 mb-5 bg-body rounded">
	<p><a class = "btn btn-info" href="../controllers/EnseignantDashboardController.php?enseig=">page d'accueil</a></p>
	<h4>Vous étes connectés <?php  echo $_SESSION['infoenseignant']['prenomEn']; ?></h4>
	<p><a class ="btn btn-danger" href="../controllers/connexion.php?ss=">Se déconnecter</a></p>
</div>
<div class="container py-5 div2">
	<div class="row">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body text-center">
		  <h2 align="center" color="blue" >Liste des absences de module <?php echo $_SESSION['mmodule'];?></h2>

<table class = "table">
	<tr>
		<th>N° Apogée</th><th>Nom Complet</th><th>Date d'absences</th>
	</tr>
	<?php foreach ($_SESSION['etudiantss'] as $key ) 
	{
    ?>
	<tr>
		<td>
		<?php echo $key['apogee'];?>	
		</td>
		<td>
		<?php echo $key['nomEt']." ".$key['preEt'];?>	
		</td>
		<td>
		<?php echo $key['DateA'];?>
		</td>
	</tr>
	<?php 
	}
	?>
</table>

<form method="POST" action="../controllers/EnseignantDashboardController.php?pdf="   >
   <!--  <h4>   Téléchargez-vous relevé de notes? </h4> --> 
 <div > <input class = "btn btn-success w-25" type="submit" name="sub1" value="Exporter en PDF" ></div><br>
  <!-- <div><input type="submit" name="sub2" value="Exporter en WORD"  class="as"></div> -->
</form>
<form method="POST" action="../controllers/EnseignantDashboardController.php?word="   >
   <!--  <h4>   Téléchargez-vous relevé de notes? </h4> --> 
 <div > <input class = "btn btn-success w-25"  type="submit" name="sub2" value="Exporter en Word" ></div>
  <!-- <div><input type="submit" name="sub2" value="Exporter en WORD"  class="as"></div> -->
</form>
</div>
</div>
</div>
</div>
</div>




</body>
</html>
<?php 
}else{
	header("location:loginView.php?access=");
}
?>