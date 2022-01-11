<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$objectifs = $_POST['objectifs'];
$id_filiere = $_POST['id_filiere'];

$debouches = $_POST['debouches'];
$update_debouches = $_POST['update_debouches'];

/*$pfe = $_POST['pfe'];
$stage = $_POST['stage'];
$partenariats_cooperation = $_POST['partenariats_cooperation'];
$competences = $_POST['competences'];
$conditions_acces = $_POST['conditions_acces'];

$update_objectifs = $_POST['update_objectifs'];
$update_condition_acces = $_POST['update_condition_acces'];
$update_competences = $_POST['update_competences'];
$update_pfe= $_POST['update_pfe'];
$update_stage = $_POST['update_stage'];
$update_partenariats = $_POST['update_partenariats'];*/


## Modifier Objectifs 
 /* if (isset($update_objectifs)){
        $sql = "UPDATE filiere SET objectifs = '$objectifs' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "votre modification est bien effectuer $id_filiere ";
		       }
		else{
			  $_SESSION['error'] = "une erreur est produit dans la modification ressayer $id_filiere!!!!" ;
		    }}  */        
  
if (isset($update_debouches) && isset($debouches)){
        $sql = "UPDATE filiere SET debouches = '$debouches' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer </strong> ";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la modification ressayer !!!!</strong>" ;
		    }}          
  

/*else if (isset($update_pfe) && isset($pfe)){
        $sql = "UPDATE filiere SET pfe = '$pfe 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "votre modification est bien effectuer $id_filiere ";
		       }
		else{
			  $_SESSION['error'] = "une erreur est produit dans la modification ressayer $id_filiere!!!!" ;
		    }}          
  else if (isset($update_competences) && isset($competences)){
        $sql = "UPDATE filiere SET competences = '$competences' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "votre modification est bien effectuer $id_filiere ";
		       }
		else{
			  $_SESSION['error'] = "une erreur est produit dans la modification ressayer $id_filiere!!!!" ;
		    }}          
  else if (isset($update_condition_acces) && isset($conditions_acces)){
        $sql = "UPDATE filiere SET conditions_acces = '$conditions_acces' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "votre modification est bien effectuer $id_filiere ";
		       }
		else{
			  $_SESSION['error'] = "une erreur est produit dans la modification ressayer $id_filiere!!!!" ;
		    }}          
  
 else if (isset($update_stage) && isset($stage)){
        $sql = "UPDATE filiere SET stage = '$stage' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "votre modification est bien effectuer $id_filiere ";
		       }
		else{
			  $_SESSION['error'] = "une erreur est produit dans la modification ressayer $id_filiere!!!!" ;
		    }} 
		     else if (isset($update_partenariats) && isset($partenariats_cooperation)){
        $sql = "UPDATE filiere SET partenariats_cooperation = '$partenariats_cooperation' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "votre modification est bien effectuer $id_filiere ";
		       }
		else{
			  $_SESSION['error'] = "une erreur est produit dans la modification ressayer $id_filiere!!!!" ;
		    }}*/          
  
           






        }else{
		$_SESSION['error'] = 'Fill up add form first';
		
	      }
header("location:../affecter_mod.php?id_filiere=$id_filiere");
           
           
       ?>