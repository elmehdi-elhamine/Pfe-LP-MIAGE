<?php 
  

include('../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_poste = $_POST['id_poste'];

$id_election = $_POST['id_election'];
$condition_type_prof = $_POST['condition_type_prof'];

$condition_anciennete = $_POST['condition_anciennete'];

$condition_grade = $_POST['condition_grade'];
$condition_specialite = $_POST['condition_specialite'];
if (isset($condition_type_prof) && isset($condition_type_prof) ) {
	



	
$grade="";  
foreach($condition_grade as $gra)  
   {  
      $grade .= $gra." - ";  
   }
   $type_prof="";  
foreach($condition_type_prof as $type)  
   {  
      $type_prof .= $type." - ";  
   }  

$sql = "UPDATE poste SET condition_type_prof = '$type_prof',
condition_anciennete = '$condition_anciennete', condition_specialite = '$condition_specialite',condition_grade = '$grade'    WHERE id_poste= '$id_poste' "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la modification ressayer !!!!</strong>" ;
		    } }





		    else if(!isset($condition_type_prof) )  {

$grad="";  
foreach($condition_grade as $gr)  
   {  
      $grad .= $gr." - ";  
   }
$sq = "UPDATE poste SET condition_type_prof = NULL,condition_anciennete = '$condition_anciennete', condition_specialite = '$condition_specialite',condition_grade ='$grad' WHERE id_poste= '$id_poste' "; 
             $statement = $db->prepare($sq);
                        $resul=$statement->execute();


              if($resul)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la modification ressayer !!!!</strong>" ;
		    } 


            }

		    else if(!isset($condition_grade) )  {

		    	$type_pro="";  
foreach($condition_type_prof as $typ)  
   {  
      $type_pro .= $type." - ";  
   }  

$s = "UPDATE poste SET condition_type_prof = '$type_pro',condition_anciennete = '$condition_anciennete', condition_specialite = '$condition_specialite',condition_grade = NULL WHERE id_poste= '$id_poste' "; 
             $statement = $db->prepare($s);
                        $resu=$statement->execute();


              if($resu)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la modification ressayer !!!!</strong>" ;
		    } 


            }

		   















        }
       else{
		$_SESSION['error'] = "<strong>Cliquer sur formulaire de modification !!!!<strong>";
		
	      }
header("location:poste_liste.php?id_election=$id_election");
           
       ?>