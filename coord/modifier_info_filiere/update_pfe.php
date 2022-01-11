<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_filiere = $_POST['id_filiere'];
$pfe = $_POST['pfe'];
$update_pfe= $_POST['update_pfe'];
## Modifier Competences
 if (isset($update_pfe) && isset($pfe)){
        $sql = "UPDATE filiere SET pfe = '$pfe' 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer </strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la modification ressayer !!!</strong>" ;
		    }}              






        }else{
		$_SESSION['error'] = 'Fill up add form first';
		
	      }
header("location:../affecter_mod.php?id_filiere=$id_filiere");
           
           
       ?>