<?php


include('../settings/dbconfig.php');
 session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$nom_poste=$_GET['nom_poste'];
$professeur=$_SESSION['coordFiliere']['id_prof'];
$poste=$_POST['poste'];
 $date_fin=$_POST['date_fin'];
$date_debut=$_POST['date_debut'];
$election=$_POST['id_election'];
if(isset($poste) )	
{

$sql ="SELECT * FROM candidats c
INNER join professeur p on p.id_prof=c.professeur
INNER JOIN poste ps on ps.id_poste=c.poste
WHERE c.professeur ='$professeur'
and c.poste='$poste'";
	$statement = $db->prepare($sql);
$statement->execute();
$candi = $statement->fetchAll(PDO::FETCH_OBJ);
if(!$candi){



	$sql ="SELECT * from poste p
	left join filiere f on f.id_filiere=p.id_filiere
	left join departement d on d.id_dprtm=p.id_departement
	where id_poste=$poste ";
	$statement = $db->prepare($sql);
$statement->execute();
$nom = $statement->fetchAll(PDO::FETCH_OBJ);
foreach ($nom as $row) {

$poste_condition_specialite=$row->condition_specialite ;
$poste_condition_grade=$row->condition_grade;
$poste_condition_annciennete=$row->condition_anciennete;
$poste_condition_type_prof=$row->condition_type_prof;

$specialite_prof = $_SESSION['coordFiliere']['specialite'];
$grade_prof  = $_SESSION['coordFiliere']['grade'];
$annciennete_prof = $_SESSION['coordFiliere']['anciennete'];
$type_prof = $_SESSION['coordFiliere']['type_prof'];

	$specialite = strpos($poste_condition_specialite, $specialite_prof);
$type = strpos($poste_condition_type_prof,$type_prof);
$grade = strpos($poste_condition_grade, $grade_prof);


if (empty($poste_condition_annciennete)and empty($poste_condition_specialite) and empty($poste_condition_grade) and empty($poste_condition_type_prof)) 
	{

	

$sql = "INSERT INTO candidats(id_candidat,poste,professeur) VALUES (NULL,'$poste','$professeur')";
$statement = $db->prepare($sql);
$statement->execute();

		
			$_SESSION['success']="Votre candidature est bien effectuer ,Vous etes maintenant candidature dans le poste <strong style=color:green;>$row->nom_poste &nbsp;$row->intitule_filiere&nbsp;$row->nom_dprtm   </strong>";
			
                  }


		else {
		
			if 
			(($grade !== false)   
			and ($type !== false) 
			and ($specialite !== false) 
			and ($poste_condition_annciennete <= $annciennete_prof )
		
	){

	

$sql = "INSERT INTO candidats(id_candidat,poste,professeur) VALUES (NULL,'$poste','$professeur')";
$statement = $db->prepare($sql);
$statement->execute();

		
			$_SESSION['success']="Votre candidature est bien effectuer ,Vous etes maintenant candidature dans le poste <strong style=color:green;>$row->nom_poste &nbsp;$row->intitule_filiere&nbsp;$row->nom_dprtm   </strong>";
			
                  }
                else  {
      
		$_SESSION['error'] ="désolé vous n'avez pas le droit pour être un candidat dans le poste
		<strong style=color:red;> $row->nom_poste  de &nbsp; $row->intitule_filiere&nbsp;$row->nom_dprtm  !!!</strong><br>vous ne sataisfaie pas les conditions suivants :<br>
		     <strong>anciennete : plus de $poste_condition_annciennete ans <br> grade :$poste_condition_grade <br> 
		     specialite : $poste_condition_specialite <br>$poste_condition_type_prof </strong>";  
		}
              }



             }}

else{
	

$_SESSION['error'] ="<strong style=color:red>Vous Avez déja fait une candidature pour ce poste !!</strong>" ;}


         }
                      
   }else{
    $_SESSION['error'] ="cliquer sur candidature !!"; } 
     
     
    
header("location:form_candidature.php?id_election=$election&date_fin_insc=$date_fin&date_debut_insc=$date_debut ");

?>