<?php
include('../settings/dbconfig.php');
$output='';
$sth = $db->prepare("SELECT * from professeur");
$sth->execute(); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $result) {
    $output.="<tr>
    <td><img class='rounded-circle' style='width: 100px' src='../images/".$result['Image']."'></td>
    <td>".$result['nomPrenom_prof']."</td>
    <td>".$result['email']."</td>
    <td>".$result['CIN_prof']."</td>
    <td>".$result['specialite']."</td>
    <td>".$result['grade']."</td>
    <td>".$result['anciennete']."</td>
    <td>".$result['type_prof']."</td>
    ".if($result['status']==NULL){."<td>hors ligne</td>".}."
    
    
    </tr>";
}

echo $output;


?>