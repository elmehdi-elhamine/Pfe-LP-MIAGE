<?php
session_start();
include('../settings/dbconfig.php');
if(isset($_POST['submit'])){
    print_r($_POST);
    $nomPrenom=htmlspecialchars($_POST['NomPrenom']) ;
       $Age=htmlspecialchars($_POST['Age']) ;
       $Email= htmlspecialchars($_POST['Email']);
       $Grade=htmlspecialchars($_POST['Grade']);
       $Type= htmlspecialchars($_POST['type']);
       $Anciennete=htmlspecialchars($_POST['Anciennete']);
       $specialite=htmlspecialchars($_POST['specialite']);
       $tele=htmlspecialchars($_POST['phone']);
       $ville=htmlspecialchars($_POST['ville']);
       $cin=htmlspecialchars($_POST['Cin']);
       $image=$_FILES['Image']['name'];
       $target="../images/";
       $cvDir="../CVs/";
       $pname=$_FILES['cv']['name'];
       $tname=$_FILES['cv']['tmp_name'];
       $stmt = $db->prepare("update professeur set nomPrenom_prof=:nomPrenom_prof,Age=:Age,email=:email,grade=:grade,specialite=:specialite,anciennete=:anciennete,type_prof=:type_prof,ville=:ville,tele=:tele,cv_prof=:cv_prof,Image=:Image where id_prof=:id_prof");
       $stmt->bindValue(':nomPrenom_prof', $nomPrenom);
        $stmt->bindValue(':Age', $Age);
        $stmt->bindValue(':email', $Email);
        $stmt->bindValue(':grade', $Grade);
        $stmt->bindValue(':specialite', $specialite);
        $stmt->bindValue(':anciennete', $Anciennete);
        $stmt->bindValue(':type_prof', $Type);
        $stmt->bindValue(':ville', $ville);
        $stmt->bindValue(':cv_prof', $image);
        $stmt->bindValue(':Image', $pname);
        $stmt->bindValue(':tele', $tele);
        $stmt->bindValue(':id_prof', $_SESSION['professeur']['id_prof']);
        $stmt->execute();
      try {
       // move_uploaded_file($_FILES['cv']['tmp_name'],$cvDir.$pname);
        move_uploaded_file($_FILES['Image']['tmp_name'],$target.$image);
        
        echo "downloaded";
      } catch (\Throwable $th) {
          throw $th;
      }
      $stmt = $db->prepare("select * from professeur where id_prof=:id_prof");
      $stmt->bindValue(':id_prof', $_SESSION['professeur']['id_prof']);
      $stmt->execute();
      $row=$stmt->fetch();
       $_SESSION['professeur']=$row;
      // header("Location:profile_prof.php");
    

}



?>