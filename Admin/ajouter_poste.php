<?php


include('../settings/dbconfig.php');
 session_start();

$id_departement=$_POST['id_departement'];
$id_election=$_POST['id_election'];
$nom_poste = $_POST['nom_poste'];
$max_vote = $_POST['max_vote'];
$description = $_POST['description'];
$condition_poste = $_POST['condition_poste'];

$condition_specialite = $_POST['condition_specialite'];
$condition_grade = $_POST['condition_grade'];
$condition_anciennete  = $_POST['condition_anciennete'];
$condition_type_prof = $_POST['condition_type_prof'];

if((!empty($nom_poste))&&(!empty($max_vote))&&(!empty($description))
	&&(!empty($id_election))&&(!empty($id_departement)))
{
	


$grade="";  
foreach($condition_grade as $gra)  
   {  
      $grade .= $gra.",";  
   }
   $type_prof="";  
foreach($condition_type_prof as $type)  
   {  
      $type_prof .= $type.",";  
   }  

$sql = "INSERT INTO poste (id_poste,nom_poste,description,condition_poste,max_vote,id_election,id_departement,id_filiere,condition_type_prof,condition_specialite,condition_grade,
condition_anciennete) 
 VALUES (
 NULL,'$nom_poste','$description', NULL,'$max_vote','$id_election','$id_departement',NULL,'$type_prof','$condition_specialite','$grade','$condition_anciennete')";
$inser=$db->query($sql);
		
			$_SESSION['success']="<strong style=color:green>la candidature $nom_poste est ajouté</strong>";
			header("location:poste_liste.php?id_election=$id_election");
    

                  }        
   else { 
    $_SESSION['error'] ="<strong style=color:red>vous avez laisser un champ vide ,Tous les champs doivent etre remplis!!</strong>"; 
    header("location:addPoste.php?id_election=$id_election");
    
     }
     

?>