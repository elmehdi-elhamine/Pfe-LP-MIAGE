<?php 
  

include('../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_module = $_POST['id_module'];
$id_profC = $_POST['profCours'];
$id_profTD = $_POST['profTD'];
$id_profTP = $_POST['profTP'];
$id_filiere = $_POST['id_filiere'];


if (!empty($id_profC)) {

  
         $sql = "UPDATE liste_modules SET prof_cours = '$id_profC' WHERE id_module = '$id_module' and id_filiere = '$id_filiere'  ";             
       
             $statement = $db->prepare($sql);
             
                        $statement->execute();
                                  $_SESSION['success'] = "<strong style=color:green>votre modification a bien efectuer</strong>";

       
    }
    
    if (!empty($id_profTD)) {
  

         $sql = "UPDATE liste_modules SET prof_TD = '$id_profTD' WHERE id_module = '$id_module' and id_filiere = '$id_filiere'  ";             
       
             $statement = $db->prepare($sql);
             
                        $statement->execute();


          $_SESSION['success'] = "<strong style=color:green>votre modification a bien efectuer</strong>";
        }

            if (!empty($id_profTP)) {
  


  
         $sql = "UPDATE liste_modules SET prof_TP = '$id_profTP' WHERE id_module = '$id_module' and id_filiere = '$id_filiere'  ";             
       
             $statement = $db->prepare($sql);
             
                        $statement->execute();


          $_SESSION['success'] = "<strong style=color:green>votre modification a bien efectuer</strong>";
    }
   
    if(empty($id_profC) && empty($id_profTD) && empty($id_profTP)){
        $_SESSION['error'] = "<strong style=color:red>Vous n'avez affecter aucun professur !</strong>" ;

        }    

    




    }

else{
		$_SESSION['error'] = 'Vous devez cliquer sur la formulaire de modification premierement!!!! ';
		
	}

header('location:Gfil_listeModProf.php');
           
       ?>