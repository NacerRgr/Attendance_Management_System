<?php 
session_start();
if($_SESSION['con']==1)
{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	 
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
	<p><a class = "btn btn-info" href="etudiantDashboardview.php?dashetu=ok">page d'accueil</a></p>
	<h4>Vous étes connectés <?php  echo $_SESSION['nacer']['preEt']; ?></h4>
	<p><a class ="btn btn-danger" href="../controllers/connexion.php?ee=">Se déconnecter</a></p>
 <!-- <h3>Bienvenue sur votre page d'accueil</h3>
 <p>Les informations de l'étudiant</p> -->
</div>
<div class="container py-5 div2">
<div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
	<table class="table">
		<tr><td>Apogée</td><td>Nom</td><td>prénom</td><td>Module</td><td>type seance</td><td>Date</td><td>Heure Début</td><td>Heure fin</td><td>Salle</td><td>Enseignant</td><td><a>Justification</a></td></tr>
	<?php
	
	 foreach ($_SESSION['consulEtudiant'] as $key) {
    $_SESSION['apogee']=$key['apogee'];
    $_SESSION['nomEt']=$key['nomEt'];
    $_SESSION['preEt']=$key['preEt'];
    $_SESSION['nomM']=$key['nomM'];
    $_SESSION['typeSeance']=$key['typeSeance'];
    $_SESSION['DateA']=$key['DateA'];
	$_SESSION['A'] =  $key['idM'];

	$_SESSION['B'] =  $key['DateA'];
	$_SESSION['C'] =  $key['typeSeance'];



	?>

 		<tr><td><?php echo $key['apogee'] ?></td>
 			<td> <?php echo $key['nomEt'];?></td>
 			<td><?php echo $key['preEt'];?> </td>
 			<td><?php echo $key['nomM'];?></td>
 			<td><?php echo $key['typeSeance'];?></td>
  		<td><?php echo $key['DateA'];?></td>
 			<td><?php echo $key['heure_debut'];?></td>
 			<td><?php echo $key['heure_fin'];?></td>
 			<td><?php echo $key['idsalle'];?></td>
  		    <td><?php echo $key['nomEn'].' '.$key['prenomEn'];?></td>
  		    <td>
            <a href="justification.php?date=<?php echo $key['DateA'] ;?>&typeseance=<?php echo $key['typeSeance'];?>&module=<?php echo $key['idM'] ;?>&zz=">Justifier</a> 
          </td> 
          <!-- <td><a href="../controllers/justCetudiant.php">justification</a></td> -->

 		</tr>

<?php
}
	 ?>
	 </table>
</div>
</div>

</div>

</div>

</div>

    <!-- <button ><a href="etudiantDashboardview.php?dashetu=ok">Retourner à la page précédente</a></button>
    <br>
    <a href="../controllers/connexion.php?ee=">Se déconnecter</a> -->

 <!-- <table border="1">
  	<tr><td>Apogée</td><td>Nom</td><td>prénom</td><td>Module</td><td>type seance</td><td>Date</td><td>Heure Début</td><td>Heure fin</td><td>Salle</td><td>Enseignant</td><td><a>Justification</a></td></tr>
  	<?php 
  	session_start();
  	echo $_SESSION['consulEtudiant']['apogee'];
  	foreach ($_SESSION['consulEtudiant'] as $key) 
  	{
  	?>
  	
  	
  	
  	<tr><td><? echo $key['lienPhoto'];?></td>
  		<td><? echo $key['nomEt'];?></td>
  		<td><? echo $key['preEt'];?></td>
  		<td><? echo $key['nomM'];?></td>
  		<td><? echo $key['typeSeance'];?></td>
  		<td><? echo $key['DateA'];?></td>
  		<td><? echo $key['heure_debut'];?></td>
  		<td><? echo $key['heure_debut'];?></td>
  		<td><? echo $key['idsalle'];?></td>
  		<td><? echo $key['nomEn'];?></td>
  	
  		<td></td>
  	</tr>	
    <?php
    }
    ?>

   </table> -->
</body>
</html>
<?php
}else{
  header("location:../views/LoginEtudiantView.php?access=");
}
?>