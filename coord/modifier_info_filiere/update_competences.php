<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_filiere = $_POST['id_filiere'];
$competences = $_POST['competences'];
$update_competences = $_POST['update_competences'];



## Modifier Competences
 if (isset($update_competences) && isset($competences)){
        $sql = "UPDATE filiere SET competences = '$competences' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong> ";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la modification ressayer !!!!</strong>" ;
		    }}        






        }else{
		$_SESSION['error'] = 'Fill up add form first';
		
	      }
header("location:../affecter_mod.php?id_filiere=$id_filiere");
           
           
       ?>