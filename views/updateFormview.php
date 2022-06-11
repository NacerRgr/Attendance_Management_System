<?php
session_start();
if($_SESSION['con']==1){

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

if(isset($_GET['action']) && $_GET['action']=='update' ){
    
    switch($_GET['entity']){
        case 'etudiant':


        
        
        echo '
		<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
		<h4 class = "text-center">Ajouter Un Etudiant</h4>
        <form action="../controllers/AdminDashboardController.php?action=realUpdate&entity=etudiant" method = "POST">
	
		<div class="mb-2">
		<label class = "form-label">Apogee</label>
		<input type="text" name="typeuser" value ="'.$_SESSION['one']['apogee'].'"  disabled class = "form-control" value = "etudiant">
		</div>
		<div class="mb-2">
		<input type="text" name="apogee" class = "form-control"  value="'.$_SESSION['one']['idU'].'" hidden>
		</div>
		<div class="mb-2">
		<label class = "form-label">Nom</label>
		<input type="text" name="nomEt" class = "form-control"  value = "'.$_SESSION['one']['nomEt'].'" required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Prenom</label>
		<input type="text" name= "preEt"  class = "form-control"  value = "'.$_SESSION['one']['preEt'].'"required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Email</label>
		<input type="email" name= "email" class = "form-control"  value = "'.$_SESSION['one']['emaail'].'" required>
		</div>
		<div class="mb-2">
		<label class = "form-label">Photo</label>
		<input type="file" name= "lienPh" class = "form-control"  value = "'.$_SESSION['one']['nomEt'].'" required>
		</div>
		<div class="mb-2">
		<button class = "btn btn-primary w-100">Créer</button>   
		</div>
		</form></div>
		';


            
            break;


        case 'enseignant' : 

            // echo '<form action="../controllers/AdminDashboardController.php?action=realUpdate&entity=enseignant" method = "POST">
            // idEnseignant :<input type="text" name = "idEn" value ="'.$_SESSION['one']['idEn'].'"  disabled><br>
            // idU    :<input type="text" name ="idU" value="'.$_SESSION['one']['idU'].'" disabled><br>
            // nom :<input type="text" name = "nomEn" value ="'.$_SESSION['one']['nomEn'].'"  ><br>
            // prenom  :<input type="text" name = "preEn"  value = "'.$_SESSION['one']['prenomEn'].'"  ><br>
            // email : <input type="text" name = "email" value = "'.$_SESSION['one']['email'].'"   ><br>
            // photo  :<input type="text" name = "photo" value = "'.$_SESSION['one']['photo'].'"  ><br>
            // <button type="submit">submit</button>
            // </form>';
        
            
            echo '
			<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			<h4 class = "text-center">Modifier Un Enseignant</h4>
            <form action="../controllers/AdminDashboardController.php?action=realUpdate&entity=enseignant" method = "POST">		
			<div class="mb-2">
			<input type="text" name="idEn" class = "form-control" value ="'.$_SESSION['one']['idEn'].'"  hidden>
			</div>
		
		
			<div class="mb-2">
			<input type="text" name="idU" class = "form-control" value="'.$_SESSION['one']['idU'].'" value = "enseignant" hidden>
			</div>
		
			<div class="mb-2">
			<label class = "form-label"> Nom</label>
			<input type="text" name="nomEn"  value ="'.$_SESSION['one']['nomEn'].'"  class = "form-control" >
			</div>

			<div class="mb-2">
			<label class = "form-label">Prénom</label>
			<input type="text" name="preEn" class = "form-control" value ="'.$_SESSION['one']['prenomEn'].'"  >
			</div>

			<div class="mb-2">
			<label class = "form-label">Email</label>
			<input type="text" name="email" class = "form-control" value ="'.$_SESSION['one']['email'].'" >
			</div>

			<div class="mb-2">
			<label class = "form-label">Photo</label>
			<input type="file" name="photo" class = "form-control" value ="'.$_SESSION['one']['photo'].'"  >
			</div>

		

			<button class = "btn btn-primary w-100">Créer</button>   
			
			
			</form>
			</update>
			';


            
            break;


            
        case 'module' :

            echo '
            <div class="shadow-lg p-4 mb-5 bg-white rounded divv">
            <h4 class = "text-center">modifier le module</h4>
            <form action="../controllers/AdminDashboardController.php?action=realUpdate&entity=module" method = "POST">';
            echo '
            <div class="mb-2">
            <input class = "form-control" type = "number" name = "idM" value ='.$_SESSION['one']['idM'].' hidden  >
            </div>';
         
            echo  '
            <div class="mb-2">
            <label class = "form-label">Module</label>
            <input class = "form-control" type = "text" name = "nomM" value ="'.$_SESSION['one']['nomM'].'" >
            </div>';
            echo '	<div class="mb-2">
            <button class = "btn btn-primary w-100">Créer</button>   
            </div>';
            
            echo '</form>
            </div>';

			// echo $_SESSION['one']['nomM'];
			

            // echo '
			// <div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			// <h4 class = "text-center">Modifier un module</h4>
            // <form action="../controllers/AdminDashboardController.php?action=realUpdate&entity=module" method = "POST">
            // <div class="mb-2">
			// <label class = "form-label">Module</label>
			// <input type="text" class  = "form-control" name="nomM">
			// </div>			
			// <button class = "btn btn-primary w-100">Créer</button>   
			
		
			// </form>';
            
            break;





        case 'salle'  : 
            echo '
            
            <div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			<h4 class = "text-center">Affecter une Salle a un enseignant</h4><form  action="../controllers/AdminDashboardController.php?action=realUpdate&entity=salle" method = "POST">';
            echo '
            <div class="mb-2">

            <label class ="form-label">Numéro salle</label>
            <input type = "number" class = "form-control" value  = "'.$_SESSION['one']['idsalle'].'"  name = "numSalle" readonly><br>

            </div>';

            echo '
            <div class="mb-2">
            <select name = "numEns"  class = "form-select">';
			foreach($_SESSION['salleEns'] as $s){
				echo '<option value = "'.$s['idEn'].'">'.$s['nomEn'].' '.$s['prenomEn'].'</option>';
               
			}
			echo '</select></div><br>';
            echo '<div class="mb-2">
			<button class = "btn btn-primary w-100">Créer</button>   
			</div>';
            echo '</form></div>';
      
            break;



        case 'seance' : 


            // echo '<form action="../controllers/AdminDashboardController.php?action=realUpdate&entity=seance" method = "POST">';
			
		    // echo '<select name="moduleSelectForSeance">';
			// echo '<option value ="'.$_SESSION['one']['idM'].'">'.$_SESSION['one']['nomM'].'</option>';
            // echo '</select>';
			
            // echo '<select name = "numSalle">';
			// echo '<option value ="'.$_SESSION['one']['idsalle'].'">'.$_SESSION['one']['idsalle'].'</option>';
			// echo '</select>';


			// echo 'date :<input type="date" name="date" value = '.$_SESSION['one']['daate'].' readonly ><br>
			// heure_debut: <input type="time" min="09:00" max="18:00" name="heureD" value= "'.$_SESSION['one']['heure_debut'].'" ><br>
			// heure_fin : <input type="time" min="09:00" max="18:00" name="heureF" value= "'.$_SESSION['one']['heure_fin'].'" ><br>
            // type : <select name  = "typeSeance" >';



            // $arr = array('td','tp','cours');
            // if(($key  = array_search($_SESSION['one']['typeSeance'],$arr)) !== FALSE ){
            //     unset($arr[$key]);
            // }
           



            // echo '<option value ="'.$_SESSION['one']['typeSeance'].'">'.$_SESSION['one']['typeSeance'].'</option>';

            
            // foreach($arr as $s){
                
			// 	echo '<option value ="'.$s.'">'.$s.'</option>';
                
            // }

            // echo '</select>';

            // echo         '<button type="submit">submit</button></form>';
            


                        //----//

            echo '
			<div class="shadow-lg p-4 mb-5 bg-white rounded divv">
			<h4 class = "text-center">Ajouter une Séance </h4>
            <form action="../controllers/AdminDashboardController.php?action=realUpdate&entity=seance" method = "POST">	';		
		    echo '
			<div class="mb-2">
			<label class = "form-label"> Module </label>
			<select class = "form-select "name="moduleSelectForSeance">';
				echo '<option value ="'.$_SESSION['one']['idM'].'">'.$_SESSION['one']['nomM'].'</option>';
		
			echo '</select></div>';

			echo 
			'<div class="mb-2">

			<label class = "form-label">Numéro salle </label>';
        	echo '<input type="text" class ="form-control" name = "idsalle" value ="'.$_SESSION['one']['idsalle'].'" readonly>';
		    echo '</div>';

			
			echo '
			<div class="mb-2">
			<label class = "form-select">date</select>
			<input type="date" name="date" class  = "form-control" value = '.$_SESSION['one']['daate'].' readonly >
			
			</div>

			
			<div class="mb-2">

			<label class = "form-select">Heure Début</select>
			<input type="time" min="09:00" max="18:00"  value= "'.$_SESSION['one']['heure_debut'].'" name="heureD" class  = "form-control" required><br>
			</div>


			<div class="mb-2">
			<label class = "form-select">Heure Fin</select>


			heure_fin : <input type="time" min="09:00" max="18:00" name="heureF" value= "'.$_SESSION['one']['heure_fin'].'"  class  = "form-control" required><br>
			
			</div>';



            $arr = array('td','tp','cours');
            if(($key  = array_search($_SESSION['one']['typeSeance'],$arr)) !== FALSE ){
            unset($arr[$key]);
            }

            echo '
			<div class="mb-2">

			<select name  = "typeSeance" class = "form-select" >';
            echo '<option value ="'.$_SESSION['one']['typeSeance'].'">'.$_SESSION['one']['typeSeance'].'</option>';
            foreach($arr as $s){
                
                	echo '<option value ="'.$s.'">'.$s.'</option>';
                    
                 }
    
                // echo '</select>';
			echo '
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


