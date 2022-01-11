<?php
session_start();
include('../settings/dbconfig.php');

if (isset($_SESSION['professeur']) && isset($_POST['suivant2'])) {
	
$_SESSION['nouvelleFiliere']['etape4']=$_POST;
$sth = $db->prepare("insert into filiere(intitule_filiere,objectifs,competences,debouches,conditions_acces,pfe,stage,coorFiliere,id_cycle,id_departement) values(:intitule_filiere,:objectifs,:competences,:debouches,:conditions_acces,:pfe,:stage,:coorFiliere,:id_cycle,:id_departement)");
$sth->bindValue(':intitule_filiere',$_SESSION['nouvelleFiliere']['etape3']['intitule']);
$sth->bindValue(':objectifs',$_SESSION['nouvelleFiliere']['etape4']['Objectifs']);
$sth->bindValue(':competences',$_SESSION['nouvelleFiliere']['etape4']['Competences']);
$sth->bindValue(':debouches',$_SESSION['nouvelleFiliere']['etape4']['Debouches']);
$sth->bindValue(':conditions_acces',$_SESSION['nouvelleFiliere']['etape4']['Conditions']);
$sth->bindValue(':pfe',$_SESSION['nouvelleFiliere']['etape4']['Pfe']);
$sth->bindValue('stage',$_SESSION['nouvelleFiliere']['etape4']['Stage']);
$sth->bindValue(':coorFiliere',$_SESSION['nouvelleFiliere']['etape3']['CoordFiliere']);
$sth->bindValue(':id_cycle',$_SESSION['nouvelleFiliere']['etape3']['cycle']);
$sth->bindValue(':id_departement',$_SESSION['nouvelleFiliere']['etape2']['departement']);
$sth->execute(); 

$stmt1=$db->prepare("select * from filiere f inner join cycle c on c.id_cycle=f.id_cycle where f.intitule_filiere=:intitule_filiere and f.id_cycle=:id_cycle and f.id_departement=:id_departement");
$stmt1->bindValue(':id_cycle',$_SESSION['nouvelleFiliere']['etape3']['cycle']);
$stmt1->bindValue(':id_departement',$_SESSION['nouvelleFiliere']['etape2']['departement']);
$stmt1->bindValue(':intitule_filiere',$_SESSION['nouvelleFiliere']['etape3']['intitule']);
$stmt1->execute(); 
$res=$stmt1->fetch(PDO::FETCH_ASSOC);

$_SESSION['nouvelleFiliere']['etape5']=$res;
//print_r($result);
//print_r($_SESSION['nouvelleFiliere']);
$st=$db->prepare("select * from cycle where id_cycle=:id_cycle");
$st->bindValue(':id_cycle',$_SESSION['nouvelleFiliere']['etape3']['cycle']);
$st->execute(); 
$result1=$st->fetch(PDO::FETCH_ASSOC);
switch ($result1["nom_cycle"]) {
	case 'Licence':
		header('location:InsertModuleLicence.php');
		break;
	case 'Bachelor':
		header('location:InsertModuleBachelor.php');
		break;
	case 'Master':
		header('location:InsertModuleMaster.php');
		break;
	
	default:
		# code...
		break;
}

}




?>
