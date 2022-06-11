<?php
session_start();
if($_SESSION['con']==1){
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<style>
		.aligning{
	  	float: right;
	  	display: inline-block;
		}

		.ech1{
			display: inline-block;
		}

	
		.color1{
			background-color: #DFDFDE;
		}

		#id1{
			width : 70%;
		}		
    .dd{
        width : 100%;
    }
    table{
        margin-left : auto;
        margin-right : auto;
    }

	</style>

	<title></title>

</head>
<body>

<div class="m-3">
	<h2 class=" text-start ech1 m-1"><a class = "btn btn-info" href = "../controllers/AdminDashboardController.php?submit=submit&choix=<?php echo $_SESSION['choix1']?>">retourner à la page précedente</a></h2>
	<a class = "btn btn-danger aligning m-2" href="../controllers/connexion.php?gg=">se déconnecter</a>
	<p class="aligning ech1 m-3 ">Vous étes connectes  <strong><?php echo $_SESSION['access']?></strong></p>

</div>

<ul class="nav nav-pills justify-content-center m-5 color1 rounded">
  <li class="nav-item">
    <a class="nav-link btn btn-info"  href="#"><strong>Administration</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-primary" href="../controllers/AdminDashboardController.php?submit=submit&choix=etudiant"><strong>page principale</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-secondary" href="../controllers/AdminDashboardController.php?redirect=insertForm"><strong>créer compte/module/salle/seance</strong></a>
  </li>
  <!--<li class="nav-item">
  <a class="nav-link" href="../controllers/AdminDashboardController.php?redirect=statistic"><strong>statistiques</strong></a>
</li>-->
 
</ul>';





<?php

echo  "<div class='dd  row justify-content-center'>
 
<div class='col-auto shadow-lg p-3 mb-5 bg-body rounded'>";


if(isset($_GET['aff']) && $_GET['aff'] == 'liste'){
echo "
<table border ='1px'  class = 'table table-responsive table-striped'>
<tr >

<th	scope ='col'>nomEt</th>


<th scope ='col'>apogee</th>


<th scope ='col'>module</th>

<th scope ='col'>typeSeance</th>

<th scope ='col'>dateSeance</th>


</tr>";


foreach ($_SESSION['liste'] as $row) {





echo "<tr>";

//   echo "<th>" . $i++ . "</th>";


echo "<td>" .$row['apogee']. "</td>";

echo "<td>" .$row['nomEt']. "</td>";

echo "<td>" .$row['nomM']. "</td>";

echo "<td>" .$row['typeSeance']. "</td>";

echo "<td>" .$row['daate']. "</td>";



}
echo "</tr>
<div class='col-md-2'>
 
</div>


</div>
</div>
</table>";


echo '<form action="viewWord.php?aff=consulter"  method = "POST">
<input  class = "btn btn-dark" type="submit" name="wword" value="Exporter en Word"><br>



</form>';


}
if(isset($_GET['aff']) && $_GET['aff'] == 'absence'){
    echo "
    <table border ='1px'  class = 'text-center table table-responsive table-striped'>
    <tr >
    
    <th	scope ='col'>nomEt</th>
    
    
    <th scope ='col'>apogee</th>
    
    
    <th scope ='col'>module</th>
    
    <th scope ='col'>typeSeance</th>
    
    <th scope ='col'>dateSeance</th>
    

    

    </tr>";
    
    
    foreach ($_SESSION['liste'] as $row) {

        
    
    
    
    echo "<tr>";
    
    //   echo "<th>" . $i++ . "</th>";
    
    
    
    echo "<td>" .$row['nomEt']. "</td>";
    
    echo "<td>" .$row['apogee']. "</td>";

    echo "<td>" .$row['nomM']. "</td>";

    echo "<td>" .$row['typeSeance']. "</td>";

    echo "<td>" .$row['DateA']. "</td>";
    
    
 
   
    echo "</tr>";
}   
    echo "</table>";





    echo '
    <form action="../controllers/AdminDashboardController.php?action=justification"  method = "POST">

    <input type="submit"  class = "btn btn-danger mb-1 w-25" name="wword" value="voir justifications"><br>

    </form>
    
    <form action="viewWord.php?aff=absence"  method = "POST">
<input type="submit"  class = "btn btn-dark w-25" name="wword" value="Exporter en Word"><br>



</form>';
}

if(isset($_GET['justif'])){
  echo "
    <table border ='1px'  class = 'text-center table table-responsive table-striped'>
    <tr >
    
    <th	scope ='col'>nomEt</th>
    
    
    <th scope ='col'>apogee</th>
    
    
    <th scope ='col'>module</th>
    
    <th scope ='col'>typeSeance</th>
    
    <th scope ='col'>dateSeance</th>
    
    <th scope ='col'>fichier</th>
    <th scope ='col'>commentaire</th>


    

    </tr>";
    
    
    foreach ($_SESSION['justif'] as $row) {

        
    
    
    
    echo "<tr>";
    
    //   echo "<th>" . $i++ . "</th>";
    
    
    
    echo "<td>" .$row['nomEt']. "</td>";
    echo "<td>" .$row['apogee']. "</td>";

    echo "<td>" .$row['nomM']. "</td>";
    echo "<td>" .$row['typeSeance']. "</td>";
    
    echo "<td>" .$row['DateA']. "</td>";
    
    // echo "<td>" .$row['lienPdf']. "</td>";

    
    echo "<td><a  class = 'btn btn-primary' href='../uploads/photos/" .$row['lienPdf']. "'>voir Justification</a></td>";
    echo "<td>" .$row['commentaire']. "</td>";
 
   
    echo "</tr>";
}   
    echo "</table>";

}

// echo count($_SESSION['liste']);
}
else{
    header('Location:loginView.php?access=');

}

// var_dump($_SESSION['liste']);
?>




