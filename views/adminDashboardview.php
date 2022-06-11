<?php

session_start();
$_SESSION['access'] = $_GET['access'];

require_once "../controllers/AdminDashboardController.php";
require_once "header.php";






if(isset($_GET['choix'])){

			$_SESSION['et'] = '';
			$_SESSION['en'] = '';
			$_SESSION['mo'] = '';
			$_SESSION['sa'] = '';
			$_SESSION['se'] = '';


	switch ($_GET['choix']) {
		case 'etudiant':
			$_SESSION['et'] = 'checked';
			break;
		case 'enseignant':
			$_SESSION['en'] = 'checked';
			break;
		case 'module':
			$_SESSION['mo'] = 'checked';
			break;

		case 'salle':
			$_SESSION['sa'] = 'checked';
			break;	
		
		case 'seance' : 
			$_SESSION['se'] = 'checked';

		default:
			// code...
			break;
	}
}




?>
<style>
/* th {
    background-color: bg bg-primary;
    color: white;
}  */
table{
	margin-top : 3%;
}
body{
	height : 100%;
}
td{
	text-align : center ;
}
#id{
	margin-bottom : 5px;
	margin-top : -5px;
}
.img{
	width : 80px;
	height :80px;
	/* border-radius: 50%; */
}

</style>
<div class="container m-4">
	<h5 class="text-start m-3 display-5">Quelle type d'utilisateur  voulez vous  afficher?</h5>
</div>


<form class="text-center" method="GET" action="../controllers/AdminDashboardController.php">
	<div class="m-5 row ">
	<div class="col-2 form-check">
	<input  type="radio" name="choix" value="etudiant" class = "form-check-input" <?php if(isset($_GET['choix'])) echo $_SESSION['et']?>>
	<label class="form-check-label">étudiants</label>
	</div>
	<div class="col-2 form-check">
	<input  type="radio" name="choix" value="enseignant" class = "form-check-input" <?php  if(isset($_GET['choix'])) echo $_SESSION['en']?>>
	<label class="form-check-label">enseignants</label>
	</div>
	<div class="col-2 form-check">
	<input  type="radio" name="choix" value="module" class = "form-check-input" <?php  if(isset($_GET['choix'])) echo $_SESSION['mo']?>>
	<label class="form-check-label" >modules</label>
	</div>
	<div class="col-2 form-check">
	<input  type="radio" name="choix" value="salle" class = "form-check-input" <?php  if(isset($_GET['choix'])) echo $_SESSION['sa']?>>
	<label class="form-check-label">salles</label>
	</div>
	<div class="col-2 form-check">
	<input  type="radio" name="choix" value="seance" class = "form-check-input"<?php  if(isset($_GET['choix'])) echo $_SESSION['se']?>>
	<label class="form-check-label">seance</label>
	</div>
	<div class="col-2 mb-5">
	<button id = "id" class="btn btn-primary" type="submit" name="submit">afficher</button>
	</div>
	</div>
</form>




<?php




if(isset($_GET['choix'])){


	$i  = 0 ;

	$ARR = $_SESSION['asmahan'];

 echo "

 <div class='row justify-content-center'>
 
  <div class='col-auto'>

 

 <table border='1'  class='table table-responsive rounded table-striped text-center'>" ;

	switch ($_GET['choix']) {
		
	

		case 'etudiant':
	echo "
							<tr >
							<thead class='grey lighten-2'>

							<th	scope ='col'>Photo</th>

							<th scope ='col'>Apogée</th>

							<th	scope ='col'>Nom</th>

							<th	scope ='col'>Prénom</th>


							<th scope='col'>Email</th>

							<th	scope ='col'>Affecter</th>


							<th	scope ='col'>Modifier</th>

							<th	scope ='col'>Supprimer</th>

							</tr>
							</thead>";


		foreach ($ARR as $row) {

					
				


						  echo "<tr>";

						//   echo "<th>" . $i++ . "</th>";

						echo "<td><img class =  'rounded-circle img' src = '../uploads/photos/" . $row['lienPhoto'] . "'></td>";


						  echo "<td>" .$row['apogee']. "</td>";


						  echo "<td>" .$row['nomEt']."</td>";

						  echo "<td>".$row['preEt']."</td>";


						  echo  "<td>".$row['emaail']."</td>";


						  echo '<td><a href="../controllers/AdminDashboardController.php?entity=etudiant&action=toAffect&id='.$row['apogee'].'"><img src ="icons/briefcase.svg"></a>';


						  echo '<td><a href="../controllers/AdminDashboardController.php?action=update&entity=etudiant&apg='.$row['apogee'].'&idu='.$row['idU'].'"><img src="icons/plus-circle.svg"></a></td>';

						  echo '<td><a href="../controllers/AdminDashboardController.php?action=delete&entity=etudiant&apg='.$row['apogee'].'&idu='.$row['idU'].'"><img src="icons/trash.svg"></a></td>';



						  echo "</tr>";





		}

		
			break;
			case 'enseignant':

				echo "
				<tr>

				<th scope='col'>Photo</th>

				<th scope='col'>Nom</th>

				<th scope='col'>Prénom</th>
				
				<th scope='col'>Email</th>

			

				<th scope='col'>Affecter</th>


				<th	scope ='col'>Modifier</th>

				<th	scope ='col'>Supprimer</th>

			
				</tr>";


				foreach ($ARR as $row) {

		


						  echo "<tr>";

						  echo "<td><img class =  'rounded-circle img' src = '../uploads/photos/" . $row['photo'] . "'></td>";


						  echo "<td>" . $row['nomEn'] . "</td>";

						  echo "<td>" . $row['prenomEn'] . "</td>";

						  echo "<td>" . $row['email'] . "</td>";

						  
					
						  echo '<td><a href="../controllers/AdminDashboardController.php?entity=enseignant&action=toAffect&id='.$row['idEn'].'"><img src ="icons/briefcase.svg"></a>';


						  echo '<td><a href="../controllers/AdminDashboardController.php?action=update&entity=enseignant&ide='.$row['idEn'].'&idu='.$row['idU'].'"><img src="icons/plus-circle.svg"></a></td>';

						  echo '<td><a href="../controllers/AdminDashboardController.php?action=delete&entity=enseignant&ide='.$row['idEn'].'&idu='.$row['idU'].'"><img src="icons/trash.svg"></a></td>';
						
						
						  

						  echo "</tr>";

					





		}
		
			break;
		
		case 'module':


			
			echo "
			<tr>

			

			<th>Nom</th>

			<th	scope ='col'>Modifier</th>

			<th	scope ='col'>Supprimer</th>

			</tr>";


		foreach ($ARR as $row) {
		

						  echo "<tr>";

					

						  echo "<td>" . $row['nomM'] . "</td>";

						  echo '<td><a href="../controllers/AdminDashboardController.php?action=update&entity=module&idm='.$row['idM'].'"><img src="icons/plus-circle.svg"></a></td>';

						  echo '<td><a href="../controllers/AdminDashboardController.php?action=delete&entity=module&idm='.$row['idM'].'"><img src="icons/trash.svg"></a></td>';


						  echo "</tr>";

		}
		
			break;

		case 'salle':	

			echo "
			<tr>

			<th>Nom</th>

			<th>Numéro Salle</th>
		
			<th	scope ='col'>Modifier</th>

			<th	scope ='col'>Supprimer</th>


			</tr>";

		foreach ($ARR as $row) {
		
			


						  echo "<tr>";

						  echo "<td>" . $row['nomEn'] . "</td>";

						  echo "<td>" . $row['idsalle'] . "</td>";

						  echo '<td><a href="../controllers/AdminDashboardController.php?action=update&entity=salle&id='.$row['idsalle'].'"><img src="icons/plus-circle.svg"></a></td>';

						  echo '<td><a href="../controllers/AdminDashboardController.php?action=delete&entity=salle&id='.$row['idsalle'].'"><img src="icons/trash.svg"></a></td>';
						  
						  
						  echo "</tr>";

		}
			break;



		case 'seance' : 
			echo "
			<tr>

		

			<th>Nom</th>

			<th>Module</th>

			<th>Date</th>
			
			<th>Numéro Salle</th>

			
			<th>Heure Début</th>
			
			<th>Heure Fin</th>
			
			<th>Type Séance</th>

			<th	scope ='col'>Modifier</th>

			<th	scope ='col'>Supprimer</th>
			
			<th	scope ='col'>consulter liste des étudiants</th>

			<th	scope ='col'>consulter liste des absents</th>



			</tr>";


			foreach ($ARR as $row) {
		
			


				echo "<tr>";




				echo "<td>" . $row['nomEn'].' '.$row['prenomEn']. "</td>";




				echo "<td>" . $row['nomM'] . "</td>";

				echo "<td>" . $row['daate'] . "</td>";

				echo "<td>" . $row['idsalle'] . "</td>";

				echo "<td>" . $row['heure_debut'] . "</td>";

				echo "<td>" . $row['heure_fin'] . "</td>";

				echo "<td>" . $row['typeSeance'] . "</td>";



				echo '<td><a href="../controllers/AdminDashboardController.php?action=update&entity=seance&id='.$row['idseance'].'"><img src="icons/plus-circle.svg"></a></td>';

				echo '<td><a href="../controllers/AdminDashboardController.php?action=delete&entity=seance&id='.$row['idseance'].'"><img src="icons/trash.svg"></a></td>';
				
				echo '<td><a href="../controllers/AdminDashboardController.php?redirect=consulter&entity=seance&id='.$row['idseance'].'&choice=liste"><img src="icons/arrow-right-square.svg"></a></td>';


				echo '<td><a href="../controllers/AdminDashboardController.php?redirect=consulter&entity=seance&id='.$row['idseance'].'&choice=absence"><img src="icons/emoji-neutral.svg"></a></td>';


				echo "</tr>";

}



		default:
			// code...
			break;


	}

						echo "</table>
  <div class='col-md-2'>
 
 </div>
 
 
 </div>
 </div>";

// foreach ($ARR as $key) {
// 	echo $key['idU'];

// }
// echo '<br>
// <a href="insertForm.php?choix='.$_GET['choix'].'" class="btn btn-info">ajouter</a>';

}




?>










</body>
</html>












