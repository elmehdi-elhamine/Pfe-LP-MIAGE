<?php


include('../settings/dbconfig.php');
 session_start();

$id_election=$_POST['post'];
$id_poste = $_POST['id_candidat'];
$id_prof = $_SESSION['id'];
$voter = $_POST['voter'];


if(isset($voter))
{
	

$sql = "INSERT INTO vote (id_vote,poste, professeur,id_candidats) 
         VALUES (NULL,'$id_poste','$id_prof', '$id_candidats')";
$inser=$db->query($sql);
		
			$_SESSION['success']="le poste est ajouté";
			
                  }        
   else { 
    $_SESSION['error'] ='vous avez laisser un champ vide ,Tous les champs doivent etre remplis!!';  
     }
     
header("location:lancerVote.php");

?>