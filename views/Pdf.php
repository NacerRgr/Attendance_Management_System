<?php
		session_start(); 
		foreach ($_SESSION['etudiantabs'] as $key ) {
  echo $key['nomEt']." ".$key['preEt']." ".$key['apogee']." ". $key['idM']." ". $key['heure_debut']." ". $key['heure_fin']."<br>";
}
 require_once('tcpdf/tcpdf.php');  
  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("relevé de notes provisoires");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '0', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10); 
       
      $obj_pdf->SetFont('helvetica', '', 10); 
      $obj_pdf->AddPage(); 
      $t=""; 
      $t.='<br><br><h1 align="center" color="red">Liste des absences de module '.$_SESSION['mmodule'].'</h1>';
      $obj_pdf->writeHTML($t);
      $h="";
      $h.='<br><br><br><table border="1">
      		<tr>
      		 <th> N° apogée </th>
      		 <th> Nom complet </th>
      		 <th> Date d\'absence </th>
      		</tr>';
      	foreach ($_SESSION['etudiantss'] as $key ) {	
      $h.='<tr>
           <td> '.$key['apogee'].'</td><td> '.$key['nomEt']." ".$key['preEt'].'</td><td> '.$key['DateA'].'</td></tr>';
      	   	}
      $h.='</table>';
      $obj_pdf->writeHTML($h);
      $d="";
      // $d.="<br>";
      $d.='<p  style="text-align:right;" ><b>'.Date("d/m/Y")."</b></p>";
       $obj_pdf->writeHTML($d);
      
       ob_clean(); 
      $obj_pdf->Output('Absences','I');
?>