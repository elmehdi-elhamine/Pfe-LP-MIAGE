<?php
 session_start();

    include_once "../../settings/dbconfig.php";

    $outgoing_id = $_SESSION['coordFiliere']['id_prof'];
    $searchTerm =  $_POST['searchTerm'];

    $sql = $db->prepare("SELECT * FROM professeur WHERE NOT id_prof = {$outgoing_id} AND (nomPrenom_prof LIKE '%{$searchTerm}%') ");
    $output = "";
    $sql->execute(); 
    $row = $sql->fetchAll(PDO::FETCH_ASSOC);
    $count=$sql->rowCount();

    if($count > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?> 