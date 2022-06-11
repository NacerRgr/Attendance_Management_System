<?php
session_start();

header("Content-type:application/vnd.ms-word");
if(isset($_GET['aff']) && $_GET['aff']=='consulter'){
    $filename='listeEtudiantSeance'.$_SESSION['liste'][0]['daate'].'_'.$_SESSION['liste'][0]['nomM'].'.doc';}
if(isset($_GET['aff']) && $_GET['aff']=='absence'){
        $filename='listeAbsenceSeance'.$_SESSION['liste'][0]['daate'].'_'.$_SESSION['liste'][0]['nomM'].'.doc';}
    


header("Content-Disposition: attachment;Filename=".$filename);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>
  
table{
        margin-left : auto;
        text-align : center;
        margin-right : auto;
    } 
</style>
</head>
<body>


<?php
if(isset($_GET['aff']) && $_GET['aff']=='consulter'){
echo "
<table class = ' table table-striped text-center'>
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
echo "</tr></table>";
}


if(isset($_GET['aff']) && $_GET['aff']=='absence'){
    echo "
    <table  class='table table-striped text-center'>
    <tr >
    <th scope ='col'>apogee</th>

    <th	scope ='col'>nom</th>
    
    
    <th scope ='col'>dateSeance</th>
    <th scope ='col'>typeSeance</th>

    
    <th scope ='col'>module</th>
    
    <th scope ='col'>justification</th>

    

    <th scope ='col'>commentaire</th>

    
    </tr>";
    
    
    foreach ($_SESSION['liste'] as $row) {
    
    
    
    
    
    echo "<tr>";
    
    //   echo "<th>" . $i++ . "</th>";
    
    
    echo "<td>" .$row['apogee']. "</td>";
    
    echo "<td>" .$row['nomEt']. "</td>";
    
    echo "<td>" .$row['DateA']. "</td>";
    
    echo "<td>" .$row['typeSeance']. "</td>";
    
    echo "<td>" .$row['nomM']. "</td>";
    
    if($row['count(j.apogee)']>0){

        echo "<td><a href='" .$row['lienPdf']. "'>" .$row['lienPdf']. "</a></td>";

        echo "<td>" .$row['number']. "</td>";

    
    }
    if($row['count(j.apogee)']>0){

        echo "<td></td>";

    
    }
    echo "</tr></table>";
    // var_dump ($_SESSION['liste']);
}
}

