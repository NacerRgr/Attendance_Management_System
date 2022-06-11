<?php session_start();
if($_SESSION['con']==1){

if(isset($_GET['insert']) && $_GET['insert']=='ok'){
	$_SESSION['link'] = '../controllers/AdminDashboardController.php?submit=submit&choix='.$_SESSION['choix1'].'';
	$_SESSION['a'] = "Retourner A la page d'acceuil";
}
	if(isset($_GET['choice'])){

		$_SESSION['link'] = "../controllers/AdminDashboardController.php?redirect=insertForm";
		$_SESSION['a'] = "Retourner à la page precedente";

	}	

 ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<style>
.div1{
	width : 80%;
	margin : auto;
	margin-top  : 10%;
	height : 60%;
}
.div2{
	width : 10px;

	
}
#id1{
	margin-top : 5px;
}

p{
	text-align : center;
	margin-top: 50%;
}

.divv{
	width : 30%;
	margin-top : 1%;
	margin-left : auto;
	margin-right : auto ;

}

.s{
	float : right;
}

h4{
	margin-bottom : 5%;
}

</style>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active btn btn-warning" href="<?php echo $_SESSION['link']?>"><?php echo $_SESSION['a']?></a>
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


if(isset($_GET['insert']) && $_GET['insert']=='ok'){
$_SESSION['link'] = '../controllers/AdminDashboardController.php?submit=submit&choix='.$_SESSION['choix1'].'';

echo '

<div class = "container">

<div class = "row align-items-center justify-content-center  shadow-lg p-4 mb-5 bg-white rounded div1">

<p class="display-4 p-3">Choisir quel type a insérer</p>
<div class="col-sm-4 shadow-lg p-3 mb-5 bg-white rounded">

<form action="insertFormview.php" method="GET">
<select name="choice" class="form-select" >
    <option value="">choisir un choix </option>
    <option value="student">étudiant</option>
    <option value="enseignant">enseignant</option>
    <option value="module">module</option>
    <option value="salle">salle</option>
    <option value="seance">séance</option>

	</select>

<button class = "btn btn-primary w-100" id="id1" >submit</button>

</form> 
</div>
</div>
</div>';

}




if(isset($_GET['choice'])){
	$_SESSION['link'] = "../controllers/AdminDashboardController.php?redirect=insertForm";
	switch($_GET['choice']){

		case 'student' :
		
		
		$_SESSION['insert']='okEtu';	
		
		echo '
		<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
		<h4 class = "text-center">Ajouter Un Etudiant</h4>
		<form action="../controllers/AdminDashboardController.php?in=ok&file=no" enctype="multipart/form-data" method = "POST">


		<div class="mb-2">
		<label class = "form-label">Mot de passe</label>
		<input type="password"  class = "form-control" name="mdp" placeholder = "Entrer le mot de passe"  required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Type d\'utilisateur</label>
		<input type="text" name="typeuser" class = "form-control"   value = "etudiant">
		</div>
		<div class="mb-2">
		<label class = "form-label">Apogée</label>
		<input type="text" name="apogee" class = "form-control" placeholder = "Entrer l\'Apogée"  required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Nom</label>
		<input type="text" name="nomEt" class = "form-control" placeholder = "Entrer le nom d\'étudiant" required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Prénom</label>
		<input type="text" name= "preEt"  class = "form-control" placeholder = "Entrer le prénom" required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Email</label>
		<input type="email" name= "email" class = "form-control"  placeholder = "Entrer l\'email" required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Photo</label>
		<input type="file" name= "lienPhoto" class = "form-control" placeholder = "Entrer la photo"   required>
		</div>
		<div class="mb-2">
		<button class = "btn btn-primary w-100">Créer</button>   
		</div>
		</form>
		';



		echo '<form action="../controllers/AdminDashboardController.php?in=ok&file=ok" enctype="multipart/form-data" method = "POST">

		<div class="mb-3 text-center">
		<label class = "form-label"><h4>Créer plusieurs étudiants</h4></label>
		<input type="file" name="nomM" class = "form-control" required >
		</div>
		<button class = "btn btn-primary w-100">Créer</button>   
	   </form></div>';


		 break;
		case 'enseignant' : 
		
			$_SESSION['insert']='okEns';	
			
			echo '
			<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			<h4 class = "text-center">Ajouter Un Enseignant</h4>
			<form action="../controllers/AdminDashboardController.php?in=ok&file=no" enctype="multipart/form-data" method = "POST">
		
			<div class="mb-2">
			<label class = "form-label">Nom Utilisateur</label>
			<input type="text" name="username" class = "form-control" placeholder = "Entrer le nom d\'utilisateur"  required>
			</div>
		
			<div class="mb-2">
			<label class = "form-label">Mot de passe</label>
			<input type="password"  class = "form-control" name="mdp" placeholder = "Entrer le mot de passe" required>
			</div>
		
			<div class="mb-2">
			<label class = "form-label">Type utilisateur</label>
			<input type="text" name="typeuser" class = "form-control" value = "enseignant"  required>
			</div>
		
			<div class="mb-2">
			<label class = "form-label"> Nom</label>
			<input type="text" name="nomEns" class = "form-control"  placeholder = "Entrer le Nom"  required>
			</div>

			<div class="mb-2">
			<label class = "form-label">Prénom</label>
			<input type="text" name="preEns" class = "form-control"   placeholder = "Entrer le Prénom" required>
			</div>

			<div class="mb-2">
			<label class = "form-label">Email</label>
			<input type="text" name="email" class = "form-control"  placeholder = "Entrer l\'email" required >
			</div>

			<div class="mb-2">
			<label class = "form-label">Photo</label>
			<input type="file" name="photo" class = "form-control"  required >
			</div>

		

			<button class = "btn btn-primary w-100">Créer</button>   
			
			
			</form>
			
			';

			echo '<form action="../controllers/AdminDashboardController.php?in=ok&file=ok" enctype="multipart/form-data" method = "POST">

			<div class="mb-3">

			<label class = "form-label">Créer plusieurs Enseignants</label>


			<input type="file" class = "form-control"  name="nomM" required><br>
	
			<button class = "btn btn-primary w-100">Créer</button>   
		   
		   </form></div>';


			break;
	    case 'admin' : break;


		case 'salle' :
			$_SESSION['insert'] = 'okSalle';
			echo '
			<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			<h4 class = "text-center">Affecter une Salle a un enseignant</h4>
			<form action="../controllers/AdminDashboardController.php?in=ok" method = "POST">
			<div class="mb-2">
			<label class = "form-label">Numéro du Salle</label>
			<input type="number" class= "form-select" name="numSalle" placeholder = "Entrer Numéro du salle" required><br>
			</div>';
			echo '	
			<div class="mb-2">
		
			<label class = "form-label">Nom Enseignant</label>
			<select name = "numEns" class = "form-select">';
			foreach($_SESSION['enseignant'] as $s){
				echo '<option value = "'.$s['idEn'].'">'.$s['nomEn'].' '.$s['prenomEn'].'</option>';
			}
			echo '</select></div><br>


		
			<div class="mb-2">
			<button class = "btn btn-primary w-100">Créer</button>   
			</div>
			</form></div>
			
			';
			






			
			break;

		
		case 'module' :
			
			
		


		
			$_SESSION['insert']='okMod';	
			
		
			echo '
			<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			<h4 class = "text-center">Ajouter un module</h4>
			<form action="../controllers/AdminDashboardController.php?in=ok&file=no" method = "POST">
			<div class="mb-2">
			<label class = "form-label">Module</label>
			<input type="text" class  = "form-control" name="nomM" placeholder = "Nom Module">
			</div>			
			<button class = "btn btn-primary w-100">Créer</button>   
			
		
			</form>';
			
			echo '<form action="../controllers/AdminDashboardController.php?in=ok&file=ok" enctype="multipart/form-data" method = "POST">
			 
			<div class="mb-2 text-center">
			<label class="form-label"><h4>Insérer plusieurs modules</h4></label>
			<input type="file" name="nomM" class  = "form-control">
			</div>			

			<button class = "btn btn-primary w-100">Créer</button>   
			
			</form></div>';
			
		
			break;
	
		


		case 'seance' : 
			
			$_SESSION['insert']='okSeance';	

			
			echo '
			<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			<h4 class = "text-center">Ajouter une Séance </h4>
			<form action="../controllers/AdminDashboardController.php?in=ok" method = "POST">';
			
		    echo '
			<div class="mb-2">
			<label class = "form-label"> Module </label>
			<select class = "form-select "name="moduleSelectForSeance">';
			foreach($_SESSION['module'] as $s){
				echo '<option value ="'.$s['idM'].'">'.$s['nomM'].'</option>';
			}
			echo '</select></div>';

			// echo 
			// '<div class="mb-2">

			// <label class = "form-label">Numéro salle </label>
			//  <select  class = "form-select" name = "numSalle">';
			// foreach($_SESSION['salle'] as $s){
			// 	echo '<option value = "'.$s['idsalle'].'">'.$s['idsalle'].'</option>';
			// }
			// echo '</select></div>';

			
			echo '
			<div class="mb-2">
			<label class = "form-select">date</select>
			<input type="date" name="dateSeance" class  = "form-control" required>
			
			</div>

			
			<div class="mb-2">

			<label class = "form-select">Heure Début</select>
			<input type="time" min="09:00" max="18:00" name="heureD" class  = "form-control" required><br>
			</div>


			<div class="mb-2">
			<label class = "form-select">Heure Fin</select>


			heure_fin : <input type="time" min="09:00" max="18:00" name="heureF"  class  = "form-control" required><br>
			
			</div>


			<div class="mb-2">

			<select name  = "typeSeance" class = "form-select" >
				  <option  value = "cours">cours</otption>
				  <option  value = "td">td</otption>
				  <option  value = "tp">tp</otption>
			</select>
			</div>	<br>
			<button type="submit" class = "btn btn-primary w-100">créer</button>
			
			
			</form></div>';
			
			break;

	}
}
}

else{
	header('Location:loginView.php?access=');
	}

?>



