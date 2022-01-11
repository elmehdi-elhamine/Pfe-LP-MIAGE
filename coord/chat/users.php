<?php
    session_start();

    include_once "../../settings/dbconfig.php";
    
   

    $outgoing_id = $_SESSION['coordFiliere']['id_prof'];
               $sth = $db->prepare("SELECT * FROM professeur WHERE NOT id_prof = {$outgoing_id} ORDER BY nomPrenom_prof");
               $sth->execute(); 
               $row = $sth->fetchAll(PDO::FETCH_ASSOC);
               $count=$sth->rowCount();

               $output = "";

               if($count == 0){
                     $output .= "Aucun utilisateur n’est disponible pour le chat";
               }elseif($count > 0){

                      
                      //.................. data.php .....................................................

                      include_once "data.php";

                
               }echo $output;
?>