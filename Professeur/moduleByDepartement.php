<?php

include('../settings/dbconfig.php');
if($_REQUEST['dprtmId']) {
    $sth = $db->prepare("SELECT * from module where id_departement=:id_departement");
    $sth->bindValue(':id_departement', $_REQUEST['dprtmId']);
    $sth->execute(); 
    while($row=$sth->fetchAll(PDO::FETCH_ASSOC))
    {
        foreach ($row as $row) {
            echo "<option value=".$row['id_module'].">".$row['intitule_module']."</option>";
        }
    
    } 
}





?>