<?php 
  

include('../settings/dbconfig.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_module = $_GET['id_module'];
$id_filiere = $_GET['id_filiere'];



  
        $sql = "UPDATE liste_modules set prof_cours = NULL , prof_TD = NULL , prof_TP = NULL WHERE id_module = '$id_module' and id_filiere = '$id_filiere'  "; 
             $statement = $db->prepare($sql);
                       $result= $statement->execute();
if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>le professeur a éte supprimé avec succe</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la supprission</strong>" ;
		    }          
}
            
       else{
		$_SESSION['error'] = "<strong>clique sur supprimer !!!</strong>";
		
	      }
           header('location:Gfil_listeModProf.php');
       
       ?>