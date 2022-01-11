<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_filiere = $_POST['id_filiere'];
$partenariats_cooperation = $_POST['partenariats_cooperation'];
$update_partenariats = $_POST['update_partenariats'];
## Modifier Competences
 if (isset($update_partenariats) && isset($partenariats_cooperation)){
        $sql = "UPDATE filiere SET partenariats_cooperation = '$partenariats_cooperation' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer </strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la modification ressayer!!!!</strong>" ;
		    }}              






        }else{
		$_SESSION['error'] = 'Fill up add form first';
		
	      }
header("location:../affecter_mod.php?id_filiere=$id_filiere");
           
           
       ?>