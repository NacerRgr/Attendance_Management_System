<?php session_start();
if($_SESSION['con']==1){

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>

	
.divv{
	width : 30%;
	margin-top : 1%;
	margin-left : auto;
	margin-right : auto ;

}
</style>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active btn btn-warning" href="../controllers/AdminDashboardController.php?submit=submit&choix=<?php echo $_SESSION['choix1']?>">Retourner A la page d'acceuil</a>
      </li>
	</ul>
	  <ul class="navbar-nav s">
	  <li class="nav-item">
	<?php echo '<a class="nav-link " href="#">Vous étes connécté <strong>'.$_SESSION['access'].'</strong></a>' ?>	  
	</li>
	<li class="nav-item">
        <a class="nav-link btn btn-danger" href="../controllers/connexion.php?gg=">Se déconnécter</a>
      </li>
    </ul>
  </div>
</nav>

<?php




if(isset($_GET['entity'])){
echo '
<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
<h4 class = "text-center">Affecter un module a un etudiant</h4>
<form action="../controllers/AdminDashboardController.php?action=nowAffect&entity='.$_GET['entity'].'&file=no" method="POST">';

echo '<div class="mb-2">
<label class = "form-label">Module</label>
<select name="moduleSelect" class = "form-select">';
foreach($_SESSION['module'] as $s){
    echo '<option value ="'.$s['idM'].'">'.$s['nomM'].'</option>';
}
echo '</select></div>';
echo '	<div class="mb-2">
<button class = "btn btn-primary w-100">Créer</button>   
</div>';
echo '</form>';


if($_GET['entity']=='etudiant')
{
    	
			echo '<form action="../controllers/AdminDashboardController.php?action=nowAffect&entity=etudiant&file=ok" " enctype="multipart/form-data" method = "POST">
			<div class="mb-2">
			<h4 class = "text-center">Affecter  a plusieurs etudiant</h4>

            <input type="file"  class = "form-control" name="affect"><br>
			
			</div>
			<div class="mb-2">
			<button class = "btn btn-primary w-100">Créer</button>   
			</div>			
		
			</form></div>';
}
}



// if(isset($_GET['entity'])&& $_GET['entity']=='etudiant'){

//     echo '<form action="../controllers/AdminDashboardController.php?action=nowAffect&entity=etudiant" method="POST">';
//     echo '<table>';
//     echo '<tr>';
//     echo '<td>module</td>';
//     echo '<td><select name="moduleSelect">';
//     foreach($_SESSION['module'] as $s){
//         echo '<option value ="'.$s['idM'].'">'.$s['nomM'].'</option>';
//     }
//     echo '</select>';
//     echo '</td>';
//     echo '</tr>';
//     echo '<tr><td><button type = "submit">Submit</button></td></tr>';
//     echo '</table>';
//     echo '</form>';
//     }

}

else{
	header('Location:loginView.php?access=');
	}
?>




















