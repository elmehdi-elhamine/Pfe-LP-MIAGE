<?php
require_once("../settings/dbconfig.php");

//

$id_fil = $_GET['Id'];

require('fpdf183/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('../login/images/log.png',55,30,-70);


// code for print Heading of tables
$pdf->SetFont('Arial','',20);
$pdf->SetTextColor(0, 92, 158) ;
$pdf->SetXY(35, 30);
$pdf->Write(150,'DOCUMENT DESCRIPTIF DE LA FILIERE',0);


$pdf->SetTextColor(0,0,0) ;
$pdf->SetFont('Arial','B',10);
$ret ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='empdata' AND `TABLE_NAME`='filiere'";

$query1 = $db -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(46,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT * FROM filiere f INNER JOIN departement d ON f.id_departement=d.id_dprtm INNER JOIN cycle c ON c.id_cycle=f.id_cycle
        INNER JOIN professeur p ON f.coorFiliere=p.id_prof  where id_filiere= '$id_fil' "; 

$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll();


foreach($results as $row) {
	$pdf->SetFont('Arial','',12);	
	
	$a=$row['intitule_filiere'];
	$b=$row['nom_dprtm'];
	$c=$row['nom_cycle'];
	$d=$row['nomPrenom_prof'];
	$e=$row['Langue'];
	$f=$row['grade'];
	$g=$row['specialite'];
	$h=$row['tele'];
	$i=$row['email'];
	$j=$row['objectifs'];
	$k=$row['competences'];
	$l=$row['debouches'];
	$m=$row['conditions_acces'];
	$n=$row['listeDesModules'];
	$o=$row['moyens_logistiques'];
	$p=$row['partenariats_cooperation'];
	$q=$row['pfe'];
	$r=$row['stage'];
        
        $pdf->SetXY(15, 140);
        $pdf->SetFont('Arial','B',12);
		$pdf->Cell(46,12,utf8_decode('Intitulé de la filière'),'LTRB',0,'C',0);
		$pdf->SetFont('Arial','',12);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($a)),'LTRB',0,'C',0);

        $pdf->SetXY(15, 152);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(46,12,'Etablissement','LTRB',0,'C',0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(133,12,'FSJES Ain Sebaa','LTRB',0,'C',0);

        $pdf->SetXY(15, 164);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(46,12,utf8_decode('Département'),'LTRB',0,'C',0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($b)),'LTRB',0,'C',0);

        $pdf->SetXY(15, 176);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(46,12,'Cycle','LTRB',0,'C',0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($c)),'LTRB',0,'C',0);

        $pdf->SetXY(15, 188);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(46,12,'Coordinateur','LTRB',0,'C',0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($d)),'LTRB',0,'C',0);
        
        $pdf->SetFont('Arial','',16);
        $pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetXY(41, 266);
        $pdf->Cell(46,12,'PRESENTATION DE LA FORMATION','',0,'C',0);
        
        //------------- 1- titre ----------------------------
        $pdf->SetFont('Arial','',12);
        $pdf->SetXY(13, 22);
		$pdf->Cell(46,12,utf8_decode('1- Nature du diplôme'),'',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetXY(15, 34);
		$pdf->Cell(7,12,'','LTB',0,'L',0);
		$pdf->Cell(172,12,str_replace("?", "'",utf8_decode($c)),'TRB',0,'L',0);
        
        //------------- 2- titre ----------------------------
        $pdf->SetTextColor(0, 92, 158) ;
		$pdf->SetFont('Arial','',12);
        $pdf->SetXY(21, 54);
		$pdf->Cell(46,12,'2- Identification de la formation','',0,'C',0);
 
		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetXY(15, 66);
		$pdf->Cell(7,12,'','LT',0,'L',0);
		$pdf->Cell(26,12,utf8_decode('Intitulé  :'),'T',0,'L',0);
        $pdf->Cell(146,12,str_replace("?", "'",utf8_decode($a)),'TR',0,'L',0);

		$pdf->SetXY(15, 78);
		$pdf->Cell(7,12,'','LB',0,'L',0);
		$pdf->Cell(24,12,'Langue  :','B',0,'L',0);
        $pdf->Cell(148,12,str_replace("?", "'",utf8_decode($e)),'RB',0,'L',0);
  
        //------------- 3- titre ----------------------------
        $pdf->SetTextColor(0, 92, 158) ;
		$pdf->SetFont('Arial','',12);
        $pdf->SetXY(19, 98);
		$pdf->Cell(46,12,utf8_decode('3- Coordinateur de la filière'),'',0,'C',0);
        
        $pdf->SetXY(15, 110);
		$pdf->Cell(179,4,'','LTR',0,'L',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetXY(15, 114);
		$pdf->Cell(7,12,'','L',0,'L',0);
		$pdf->Cell(39,12,utf8_decode('Nom et Prénom  :'),'',0,'L',0);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($d)),'R',0,'L',0);

		$pdf->SetXY(15, 126);
		$pdf->Cell(7,12,'','L',0,'L',0);
		$pdf->Cell(39,12,'Etablissement  :','',0,'L',0);
        $pdf->Cell(133,12,'FSJES Ain Sebaa','R',0,'L',0);

        $pdf->SetXY(15, 138);
        $pdf->Cell(7,12,'','L',0,'L',0);
		$pdf->Cell(39,12,utf8_decode('Département  :'),'',0,'L',0);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($b)),'R',0,'L',0);

        $pdf->SetXY(15, 150);
        $pdf->Cell(7,12,'','L',0,'L',0);
		$pdf->Cell(39,12,'Grade  :','',0,'L',0);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($f)),'R',0,'L',0);

        $pdf->SetXY(15, 162);
        $pdf->Cell(7,12,'','L',0,'L',0);
		$pdf->Cell(39,12,utf8_decode('Spécialité  :'),'',0,'L',0);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($g)),'R',0,'L',0);

        $pdf->SetXY(15, 174);
        $pdf->Cell(7,12,'','L',0,'L',0);
		$pdf->Cell(39,12,utf8_decode('Téléphone  :'),'',0,'L',0);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($h)),'R',0,'L',0);

        $pdf->SetXY(15, 186);
        $pdf->Cell(7,12,'','L',0,'L',0);
		$pdf->Cell(39,12,'Email  :','',0,'L',0);
        $pdf->Cell(133,12,str_replace("?", "'",utf8_decode($i)),'R',0,'L',0);

        $pdf->SetXY(15, 198);
		$pdf->Cell(179,4,'','LBR',0,'L',0);

		//------------- 4 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
        $pdf->SetXY(15, 210);
		$pdf->Cell(46,12,utf8_decode('4- Objectifs de la filière'),'',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetXY(15, 222);
		$pdf->SetFont('Arial','',11);
		$pdf->MultiCell(179,7,str_replace("?", "'",utf8_decode($j)),'LTRB',1,'',0);
		$pdf->Ln(100);

		//------------- 5 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
        $pdf->SetLeftMargin(23);
		$pdf->Cell(46,12,utf8_decode('5- Compétences à acquérir :'),'',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
        $pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'",utf8_decode($k)),'LTRB',1,'',0);
		$pdf->Ln(10);

		//------------- 6 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
        $pdf->SetLeftMargin(23);
		$pdf->Cell(46,12,utf8_decode('6- Débouchés de la formation :'),'',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'",utf8_decode($l)),'LTRB',1,'',0);
		$pdf->SetLeftMargin(17);
		$pdf->Ln(10);

		//------------- 7 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(46,12,str_replace("?", "'",utf8_decode('7- Conditions d?accès :')),'',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'",utf8_decode($m)),'LTRB',1,'',0);
		$pdf->SetLeftMargin(17);
		$pdf->Ln(10);

		//------------- 8 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(46,12,utf8_decode('8- La liste des modules :'),'',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'", utf8_decode($n)),'LTRB',1,'',0);
		$pdf->SetLeftMargin(17);
		$pdf->Ln(10);
        
        //------------- 9 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(46,12,utf8_decode('9- Moyens logistiques :'),'',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'",utf8_decode($o)),'LTRB',1,'',0);
		$pdf->SetLeftMargin(21);
		$pdf->Ln(10);

		//------------- 10 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(46,12,utf8_decode('10- partenariats-coopération:'),'',0,'C',0);
       
		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->SetRightMargin(5);
		$pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'",utf8_decode($p)),'LTRB',1,'',0);
		$pdf->SetLeftMargin(4);
		$pdf->Ln(10);

		//------------- 11 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(46,12,'11- PFE  :','',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'",utf8_decode($q)),'LTRB',1,'',0);
		$pdf->SetLeftMargin(5);
		$pdf->Ln(10);

		//------------- 12 - titre ----------------------------
		$pdf->SetTextColor(0, 92, 158) ;
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(46,12,'12- Stage  :','',0,'C',0);

		$pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->Ln(15);
		$pdf->MultiCell(175,7,str_replace("?", "'",utf8_decode($r)),'LTRB',1,'',0);
		$pdf->SetLeftMargin(17);
		$pdf->Ln(18);
        
        

 } 


$sql = "SELECT * FROM liste_modules l INNER JOIN module m ON m.id_module=l.id_module where l.id_filiere= '$id_fil' ORDER BY semestre "; 

$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_ASSOC);

    //------------- Grand-titre-2 ----------------------------
		$pdf->SetFont('Arial','',16);
        $pdf->SetTextColor(0, 92, 158) ;
        $pdf->MultiCell(100,12,'DESCRIPTIF DES MODULES','',1,'',0);

        $pdf->SetTextColor(0, 0, 0) ;
		$pdf->SetLeftMargin(17);
		$pdf->Ln(15);
        
        $pdf->SetFont('Arial','',12);
		$pdf->Cell(30,9,'','',0,'C',0);
		$pdf->Cell(145,9,'Module','LTRB',0,'C',0);
		$pdf->Ln(9);
		$pdf->Cell(30,9,'','',0,'C',0);
		$pdf->Cell(85,9,utf8_decode('Intitulé'),'LTRB',0,'C',0);
		$pdf->Cell(40,9,'Nature','LTRB',0,'C',0);
		$pdf->Cell(20,9,'v.horaire','LTRB',0,'C',0);
		$pdf->Ln(9);


foreach($results as $results) {

	$a=$results['semestre'];
	$b=$results['intitule_module'];
	$c=$results['NatureModule'];
	$d=$results['volumeHoraire'];

	    $pdf->Cell(30,9,str_replace("?", "'",utf8_decode($a)),'LTRB',0,'C',0);
		$pdf->Cell(85,9,str_replace("?", "'",utf8_decode($b)),'LTRB',0,'C',0);
		$pdf->Cell(40,9,str_replace("?", "'",utf8_decode($c)),'LTRB',0,'C',0);
		$pdf->Cell(20,9,str_replace("?", "'",utf8_decode($d)),'LTRB',0,'C',0);
		$pdf->Ln(9);



}
    $pdf->Output();


?>