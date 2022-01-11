<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_dprtm=$_POST['id_dprtm'];
$dprtm = $_POST['dprtm'];
$chefDprtm = $_POST['chefDprtm'];
$update_dprtm = $_POST['update_dprtm'];


## Modifier Objectifs 
 if (isset($update_dprtm)){
        $sql = "UPDATE departement SET nom_dprtm = '$dprtm' 
        WHERE id_dprtm = $id_dprtm "; 
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
header('location:../departements.php');
           
       ?>