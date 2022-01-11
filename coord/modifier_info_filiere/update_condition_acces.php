<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_filiere = $_POST['id_filiere'];
$conditions_acces = $_POST['conditions_acces'];

$update_condition_acces = $_POST['update_condition_acces'];
## Modifier Competences
 if (isset($update_condition_acces) && isset($conditions_acces)){
        $sql = "UPDATE filiere SET conditions_acces = '$conditions_acces' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la modification ressayer!!!!</strong>" ;
		    }}          
  





        }else{
		$_SESSION['error'] = 'Fill up add form first';
		
	      }
header("location:../affecter_mod.php?id_filiere=$id_filiere");
           
           
       ?>