<?php
include('../settings/dbconfig.php');
if(isset($_GET['id'])){
$sth = $db->prepare("select * from professeur where id_prof=:id");
$sth->bindValue(':id', $_GET['id']);
$sth->execute(); 
$result=$sth->fetch();
print_r($result);
if (!empty($result['cv_prof'])) {
    $filePath='../CVs/'.$result['cv_prof'];
    if(file_exists($filePath)){
       /* header('Content-Type:application/pdf');
        header('Content-Description:File Transfer');
        header('Content-Disposition:attachement;filename'.basename($filePath));
        header('Expires: 0');
        header('Cache-Control:must-revalidate');
        header('Pragma:public');
        header('Content-Length:'.filesize('../Cvs/'.$result['cv_prof']));
        readfile('../Cvs/'.$result['cv_prof']);*/
        echo $filePath;
    }
   
}
}



?>