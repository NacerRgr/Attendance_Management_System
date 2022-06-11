<?php 
session_start();

// var_dump($_SESSION['nacer']);

if($_SESSION['con']==1)
{
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Accueil Etudiant</title>
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
	<div class="row">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body text-center">
            <!-- <img src="<?php echo $_SESSION['infoenseignant']['typeUser']; ?>" alt="avatar" -->
              <img src ="../images/user-picture.png" class="rounded-circle img-fluid" style="width: 140px;">
            <h5 class="my-3"><?php  echo $_SESSION['nacer']['nomEt']." ".$_SESSION['nacer']['preEt']; ?></h5>
        
          </div>
        </div>
		</div>

		<div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body text-center">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Apogee </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['nacer']['apogee'] ; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prénom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['nacer']['nomEt']  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">	<?php echo $_SESSION['nacer']['preEt'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Rôle</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['nacer']['typeUser'] ?></p>
              </div>
            </div>
			
			</div>
          </div>
        </div>

  <!-- <table>
  	
  	<tr><td>Image : </td><td><?php echo $_SESSION['nacer']['lienPhoto'] ; ?></td></tr>
  	<tr><td>Numèro d'apogée : </td><td><?php echo $_SESSION['nacer']['apogee'] ; ?></td></tr>
  	<tr><td>Nom : </td><td><?php echo $_SESSION['nacer']['nomEt'] ; ?></td></tr>
  	<tr><td>Prénom : </td><td><?php echo $_SESSION['nacer']['preEt'] ; ?></td></tr>
  	<tr><td>Rôle : </td><td><?php echo $_SESSION['nacer']['typeUser'] ; ?></td></tr>


  </table> -->
  <p> <a class = "btn btn-primary" href="../controllers/EtudiantCdashboard.php?max=">Consulter vos absences</a> </p>
  <!-- <a href="../controllers/connexion.php?ee=">Se déconnecter</a> -->

</body>
</html>
<?php
}else{
  header("location:../views/LoginEtudiantView.php?access=");
}
?>
<!--<?php
// echo "_SERVER['PHP_SELF']: " . $_SERVER['PHP_SELF']."<br>";
// echo "_SERVER['REQUEST_URI']: " . $_SERVER['REQUEST_URI']."<br>";
// echo "_SERVER['QUERY_STRING']: " . $_SERVER['QUERY_STRING']."<br>";
// echo "_SERVER['REQUEST_METHOD']: " . $_SERVER['REQUEST_METHOD'];
// ?>
 -->
