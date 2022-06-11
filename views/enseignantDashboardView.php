<?php
	session_start();
	// echo $_SESSION['idenseignant'];

	?>
	<?php
	if($_SESSION['con']==1)
	{
	 ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil Enseignant</title>
	<meta charset="utf-8">
</head>
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
            <!-- <img src="<?php echo $_SESSION['infoenseignant']['typeUser']; ?>" alt="avatar" -->
              <img src ="../images/user-picture.png" class="rounded-circle img-fluid" style="width: 140px;">
            <h5 class="my-3"><?php  echo $_SESSION['infoenseignant']['nomEn']." ". $_SESSION['infoenseignant']['prenomEn']; ?></h5>
        
          </div>
        </div>
		</div>
	
	<div>
	<div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body text-center">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php  echo $_SESSION['infoenseignant']['nomEn']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prénom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php  echo $_SESSION['infoenseignant']['prenomEn']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">	<?php  echo $_SESSION['infoenseignant']['email']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Rôle</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php  echo $_SESSION['infoenseignant']['typeUser']; ?></p>
              </div>
            </div>
			
			</div>
          </div>
        </div>
			<div class="col-lg-12">
        <div class="card mb-4 ">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                <h4 class="mb-0">Les modules </h4>
              </li>
			  <?php

			foreach ($_SESSION['moduleenseignant'] as $key) {
	echo ' <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">'.$key['nomM'].'</p>';
              echo  '</li>';}

			  ?>
             
            </ul>
          </div>
        </div>
      </div>
		<div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
		<h2 class = "text-center">Les séances  </h2>
		<hr class = "hr">
<form method="post" action="../controllers/EnseignantDashboardController.php?m=">
<div class = "size ">	
<input type="text" class = "form-control" name="module" placeholder="Chercher un module" required="true" >
</div>
<div class = "custom">
<input class=" btn btn-secondary" type="submit" name="sub" value="Chercher">
</div>
<!-- <div class="m">
 <input class="btn btn-primary" type="submit" name="sub" value="Chercher">
</div>  -->
</form>
 <table class = "table text-center table-secondary" >
	<!-- <tr>
		<td colspan=" 6"></td>
		
		<td >
			<form method="post" action="../controllers/EnseignantDashboardController.php?m=">
 			<input type="text" name="module" placeholder="Chercher un module" required="true" >
 			<input type="submit" name="sub" value="OK">
			 </form>
		</td>
	</tr> -->

 	<tr>

 		<th scope="col"> Module </th>
 		<th scope="col"> Date de séance</th>
 		<th scope="col"> Heure de début </th>
 		<th scope="col"> Heure de fin </th>
 		<th scope="col"> Type de la sénace </th>
 		<th scope="col"> Salle</th>
 		<th scope="col"> Marquer l'absences </th>
 		<th scope="col">Liste des absences</th>

 	</tr>

<?php 
 	foreach ($_SESSION['seancesenseignant'] as $key) {
 	?>
 	<tr>
 		<td> <?php echo $key['nomM']; ?></td>
 		<td> <?php echo $key ['daate']; ?> </td>
 		<td> <?php echo $key ['heure_debut']; ?>  </td>
 		<td> <?php echo $key ['heure_fin']; ?> </td>
 		<td> <?php echo $key ['typeSeance']; ?> </td>
 		<td> <?php echo $key ['idsalle']; ?></td>
 		<td>
 			<a href="../controllers/listesCetudiants.php?idM=<?php echo $key['idM']; ?>&datee=<?php echo $key['daate']; ?>&h_d=<?php echo $key['heure_debut'];?>&h_f=<?php echo $key['heure_fin'];?>">
 			<img src = "icons/arrow-90deg-right.svg">
 		    </a> 
 		</td>
 		<td>
 			<a href="../controllers/listesCetudiants.php?idM=<?php echo $key['idM']; ?>&datee=<?php echo $key['daate']; ?>&h_d=<?php echo $key['heure_debut'];?>&h_f=<?php echo $key['heure_fin'];?>&m=&module=<?php echo $key['nomM']; ?>"><img src ="icons/archive.svg">
 			</a>
 		</td>
 	</tr>	
 	<?php 
     }
 	?>
 </table>	
		</div>
			</div>

			</div>

		<!-- 
		Image : 
		<?php  echo $_SESSION['infoenseignant']['photo']; ?>
		Nom : 
		<?php  echo $_SESSION['infoenseignant']['nomEn']; ?>


		Prénom : 
		<?php  echo $_SESSION['infoenseignant']['prenomEn']; ?>

		Email : 
		<?php  echo $_SESSION['infoenseignant']['email']; ?>
	

		Rôle :
		<?php  echo $_SESSION['infoenseignant']['typeUser']; ?>
	 -->

</div>
</div>
<!-- <h2>Les modules : </h2> -->
<?php
// /*$_SESSION['moduleenseignant']*/
// foreach ($_SESSION['moduleenseignant'] as $key) {
//  ?>
<!-- // <ul>
// 	<li><?php echo $key['nomM']; ?></li>
// </ul> -->
<!-- // <?php
// }
//  ?> -->

<div>

</body>
</html>
<?php 
}else{
	header("location:loginView.php?access=");
}
?>