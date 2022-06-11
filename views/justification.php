<?php
session_start();
if($_SESSION['con']==1)
{

if(isset($_GET['zz']))
header("Location:justification.php?date=&typeseance=td&module=&jus=");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Justification</title>
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
	.ssss{
		margin-top:3%;
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
            <div class="row">
	<form method="POST" action="../controllers/justCetudiant.php?date=<?php echo $_SESSION['getdat']; ?>&typeseance=<?php echo $_SESSION['gettypeseance'];?>&module=<?php echo $_SESSION['getmodule']; ?>" enctype="multipart/form-data" >
    <table class ="table text-center">
<?php
if(isset($_GET['date'])&&isset($_GET['typeseance'])&& isset($_GET['module']))
$_SESSION['getdat']=$_GET['date'];
$_SESSION['gettypeseance']=$_GET['typeseance'];
$_SESSION['getmodule']=$_GET['module'];

 ?>
     <tr>
     	<td colspan="2">
     		<?php 
     		if(isset($_GET['jus']))
     		{
     			// echo "<font color='red'><center><h3><strong>La réclamation est envoyée par succès</strong></h3></center></font>";
     		}
     		?>
     		
     	</td>
     </tr>
     
	  <tr>
	     <td> <label class="form-label "><h3>Nom</h3></label> </td>
		 <td><input class = "form-control" type="text" name="n1" value="<?php echo $_SESSION['nomEt'];?>" readonly></td>
	     </tr>
	     <tr>
	     	<td><label class="form-label "><h3>Prénom</h3></label> </td><td><input type="text" class = "form-control" name="n2" value="<?php echo $_SESSION['preEt'];?>" readonly></td>
	     </tr>
	     <tr>
		 <td> <label class="form-label "><h3>Apogee</h3></label> </td>

		 <td><input class= "form-control" type="text" name="n3" value="<?php echo $_SESSION['apogee'];?>" readonly></td>
	     </tr>
	        <td> <label class="form-label "><h3>Séance</h3></label> </td>
			<td><input class = "form-control" type="text" name="n4" value="<?php echo $_SESSION['gettypeseance'];?>" readonly></td>
	     </tr>
	     <tr>
	     
			 <td> <label  class="ssss form-label "><h3>Commentaire</h3></label> </td>
			 <td><textarea class = "form-control" width="40px" name="n5" height="20px" placeholder="Envoyez un message" required="true"></textarea></td>
		</tr>
	     <tr >
	     	    <td>
				 <label class="form-label "><h3>Photo</h3></label>
				 </td>	
	     	    <td><input class = "form-control" type="file" name="fich"  multiple="true" required="true" ></td>
	     </tr>
	     <tr>
	     	<td></td>
	     		     	<td><input class = "btn btn-primary w-50" type="submit" name="sub" value="envoyer"></td>
	     </tr>
	     <tr>
	     	<td></td>
	     	<td>
	     		<a class = "btn btn-primary w-50"  href="consulterAetudiant.php?max">Retourner à la page précédente</a>
	     	</td>
	     </tr>
	   

    </table>
    </form>
		</div>
		</div>
		</div>
		</div>

	</body>
</html>
<?php
}else{
  header("location:../views/LoginEtudiantView.php?access=");
}
?>
