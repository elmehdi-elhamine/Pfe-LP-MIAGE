<?php


include('../settings/dbconfig.php');
 session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_poste = $_POST['id_poste'];
$id_voters = $_SESSION['coordFiliere']['id_prof'];
$id_candidat = $_POST['id_candidat'];
 $election=$_POST['election'];
                  $date_election=$_POST['date_election'];

if (isset($id_candidat)){
$COUNT=0;
$sql="SELECT * from vote v
LEFT JOIN candidats c on c.id_candidat=v.id_candidat
LEFT JOIN poste p on p.id_poste=c.poste


where p.id_poste =$id_poste
and v.id_voters = $id_voters
";
$statement = $db->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();

                       
                        
                       
                  
       
     
        if(!$result) {




  


$sql = "INSERT INTO vote (id_vote, id_voters,id_candidat) 
         VALUES (NULL,'$id_voters','$id_candidat')";
$statement = $db->prepare($sql);
                        $result=$statement->execute();

    
      $_SESSION['success']=" <strong style=color:green>Votre vote est bien envoyer, Merci  </strong>";
      header("location:lancerVote.php?id_election=$election&date_election=$date_election");
      
                  }

              else {
             echo $_SESSION['error'] =" <strong style=color:red>vous avez deja voter sur cette candidature </strong>" ;
             header("location:lancerVote.php?id_election=$election&date_election=$date_election");

                   }
}        
   else { 
    $_SESSION['error'] ="<strong style=color:red>vous n'avez pas selectionner un candidat,vous devez cliquer sur voter pour envoyer votre vote!!</strong>"; 
    header("location:espace_vote.php?id_poste=$id_poste&id_election=$election&date_election=$date_election"); 
     }



 }
     


?>