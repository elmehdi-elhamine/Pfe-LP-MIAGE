<?php
include('../settings/dbconfig.php');

	function generateRow($db){


		$contents = '';
    $election=$_GET['id_election'];
    $id_poste=$_GET['id_poste'];

      $sql = "SELECT * from poste p inner join election e on p.id_election='$election'
LEFT JOIN departement d on d.id_dprtm=p.id_departement
LEFT JOIN filiere f on f.id_filiere=p.id_filiere
where e.status='active' and (p.id_departement is not null or p.id_filiere is not null) and p.id_poste='$id_poste'";
$statement = $db->prepare($sql);
$statement->execute();
$poste = $statement->fetchAll(PDO::FETCH_OBJ);
foreach ($poste as $roww) {



if (empty($roww->intitule_filiere)) {
  # code...
 


            $contents .= '
            <tr style="background-color: #91DBF3 ;">
              <td colspan="2" align="center" style="font-size:10px;height:30px;"><b>'.$roww->nom_poste.'   '
              .$roww->nom_dprtm.'</b>
              </td>
            </tr>
            <tr>
              <td width="50%"><b>Professeur</b></td>
              <td width="50%"><b>Nombre des votes</b></td>
           
            </tr>
          
          ';}
          else {
  
           $contents .=  '
           <tr style="background-color: #DFE8EB;">
              <td colspan="2" align="center" style="font-size:10px;height:30px;"><b>'.$roww->nom_poste.' ' .'Filiere'.'   '.$roww->intitule_filiere.'</b>
              </td>
            </tr>
            <tr>
              <td width="50%"><b>Professeur</b></td>
              <td width="50%"><b>Nombre des votes</b></td>

            </tr>
           
          ';}





	 	
		$sql = "SELECT COUNT(c.id_candidat) as vote ,p.nom_poste as poste,d.nom_dprtm,f.intitule_filiere as filiere ,pr.nomPrenom_Prof as candidat FROM vote v 
INNER JOIN candidats c on c.id_candidat=v.id_candidat
INNER JOIN poste p on p.id_poste=c.poste 
inner join professeur pr on pr.id_prof=c.professeur

LEFT JOIN filiere f on f.id_filiere=p.id_filiere
left join departement d on d.id_dprtm=p.id_departement
 where p.id_poste='$roww->id_poste'
 
 GROUP BY c.id_candidat";
$statement = $db->prepare($sql);
$statement->execute();
$poste = $statement->fetchAll(PDO::FETCH_OBJ);
foreach ($poste as $row) {

       
        	$id = $row->poste;
        	$contents .= '
        	
      				<tr>

            
      					<td>'.$row->candidat.'</td>


      				<td>'.  $row->vote .' </td>





      				</tr>';
             
      	 ;

    		}}

        

		return $contents;
	}
    $elec=$_GET['id_election'];
	$sql = " SELECT * FROM `election`
 WHERE STATUS='active' and id_election='$elec'";
$statement = $db->prepare($sql);
$statement->execute();
$election = $statement->fetchAll(PDO::FETCH_OBJ);
foreach ($election as $ro) {
                        $title=$ro->nom_election    ; 




	require_once('../tcpdf/tcpdf.php'); 

    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Result: '.$title);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
    <img align="center" src="img/fac.png"  width="200" height="100" 
    
     alt="navbar brand" class="navbar-brand">
      	<h2 align="center">'.$title.' </h2>
      	<h4 align="center">Resultas de vote</h4>
      	<table border="1" cellspacing="0" cellpadding="3"> 
        
      ';  
   	$content .= generateRow($db);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('election_result.pdf', 'I');
 }
?>