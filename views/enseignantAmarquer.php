<?php
session_start();

// foreach ( ) {
//   echo $key['nomEt']." ".$key['preEt']." ".$key['apogee']." ". $key['idM']." ". $key['heure_debut']." ". $key['heure_fin']."<br>";
// }
?>
	<?php
	if($_SESSION['con']==1)
	{
	 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Marquer l'absences</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/page.css">
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
		width : 69%;
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

<div class="shadow-lg p-3 mb-5 bg-body rounded container py-5 div2">
<div class="row">
<div class="col-lg-12">
<form method="POST" >
<table  class = "table text-center table-secondary">
	<tr>
	<th scope="col">Nom complet</th>
	<th scope="col">N°apogée</th>
	<th scope="col">Marquer l'absences</th>
	</tr>
	<?php 
     foreach($_SESSION['etudiantabs']as $key)
     {  
	?>
	<tr>
		<td><?php echo $key['nomEt']." ".$key['preEt'] ;?></td>
		<td><?php echo $key['apogee'] ;?></td>
		<td >
			<!-- <input type="submit" name="etatA" value="A" > -->
			<?php 
			if(isset($_GET['ok'])&& isset($_GET['apogee']))
			{
				if($key['apogee']==$_GET['apogee'])
				{
   			?>
            
   			<button class = "btn btn-danger" type="submit" name="etatA" value="A"   disabled="true">
				<!-- <a style="text-decoration: none;"> -->
				A
			   <!-- </a> -->
		    </button>

			<?php 
			}
			if($key['apogee']!=$_GET['apogee']){
				?>
			<button class = "btn btn-success" type="submit" name="etatA" value="A" >
				<a href="../controllers/marqueCabsences.php?etata=&apogee=<?php echo $key['apogee'] ;?>" style="text-decoration: none;">
				A
			   </a>
		    </button>
		    <?php
			}
		}else{
			?>
			<button  class = "btn btn-success" type="submit" name="etatA" value="A" >
				<a href="../controllers/marqueCabsences.php?etata=&apogee=<?php echo $key['apogee'] ;?>" style="text-decoration: none;">
				A
			   </a>
		    </button>

		<?php }
			?>
			<!-- <input type="submit" name="etatP" value="P" > -->
			<!-- <button type="submit" name="etatP" value="P" >
				<a href="../controllers/marqueCabsences.php?etatp=<?php echo "P" ;?>&apogee=<?php echo $key['apogee'] ;?>" style="text-decoration: none;">
				P
			    </a>
			</button> -->
		</td>
	</tr>
	<?php 
	}
	?>
	<!-- <tr><td colspan="3"> <input type="submit" name="enregistrer" value="Enregistrer"></td></tr> -->
</table>
</form>
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