<?php 
  

include('../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_poste = $_POST['id_poste'];
$description = $_POST['description'];
$id_election = $_POST['id_election'];


  
        $sql = "UPDATE poste SET description = '$description' WHERE id_poste = '$id_poste' "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la modification ressayer !!!!</strong>" ;
		    }          

            }
       else{
		$_SESSION['error'] = "<strong>Cliquer sur formulaire de modification !!!!<strong/>";
		
	      }
header("location:poste_liste.php?id_election=$id_election");
           
       ?>