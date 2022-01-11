<?php
include('../settings/dbconfig.php');
if($_REQUEST['equipeId']) {
    $sth = $db->prepare("SELECT * from professeur where id_equipe =:id_equipe and isCoordFiliere=0 and isChefDepartement=0 and isCoordModule=0  ");
    $sth->bindValue(':id_equipe', $_REQUEST['equipeId']);
    $sth->execute(); 
    while($row=$sth->fetchAll(PDO::FETCH_ASSOC))
    {
        foreach ($row as $row) {
            echo "<option value=".$row['id_prof'].">".$row['nomPrenom_prof']."</option>";
        }
    
    } 
}



?>