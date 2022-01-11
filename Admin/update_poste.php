<?php 
  

include('../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_poste = $_POST['id_poste'];
$id_election = $_POST['id_election'];
$nom_poste = $_POST['nom_poste'];
$max_vote = $_POST['max_vote'];
$description = $_POST['description'];

$id_filiere = $_POST['id_filiere'];
$id_departement = $_POST['id_departement'];

if (isset($nom_poste)&&isset($max_vote)&&isset($description)&&isset($id_departement)){
  $sql = "UPDATE poste SET nom_poste= '$nom_poste' ,description = '$description',max_vote = '$max_vote',id_filiere = NULL, id_departement='$id_departement'
   WHERE id_poste = '$id_poste'"; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer .</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la modification ressayer </strong>!!!!" ;
		    }          

            }


else if(isset($nom_poste)&&isset($max_vote)&&isset($description)&&isset($id_filiere)){
	

$sql = "UPDATE poste SET nom_poste= '$nom_poste' ,description = '$description' ,max_vote = '$max_vote',id_filiere = '$id_filiere', id_departement= NULL WHERE id_poste = '$id_poste' "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = 'votre modification est bien effectuer';
		       }
		else{
			  $_SESSION['error'] = "une erreur est produit dans la modification ressayer !!!!" ;
		    }          

            }}

       else{
		$_SESSION['error'] = 'Cliquer sur le formulaire de modification premierement !!!' ;
		
	      }

header("location:poste_liste.php?id_election=$id_election");
           
       ?>