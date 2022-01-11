<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$objectifs = $_POST['objectifs'];
$id_filiere = $_POST['id_filiere'];
$update_objectifs = $_POST['update_objectifs'];


## Modifier Objectifs 
 if (isset($update_objectifs)){
        $sql = "UPDATE filiere SET objectifs = '$objectifs' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la modification ressayer!!!!</strong>" ;
		    }}         






        }else{
		$_SESSION['error'] = 'Clisuer sur supprimer !!!';
		
	      }
header("location:../affecter_mod.php?id_filiere=$id_filiere");
           
           
       ?>