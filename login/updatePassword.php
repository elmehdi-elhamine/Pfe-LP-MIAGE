<?php
include('../settings/dbconfig.php');
if(isset($_POST['submit'])){
    if(!empty($_POST['password1'] && !empty($_POST['password2']))){
        if($_POST['password1']==$_POST['password2']){
            $pass1=password_hash($_POST['password1'],PASSWORD_DEFAULT);
            $email=$_POST['email'];
             $sth = $db->prepare("select id_prof from professeur where email=:email");
            $sth->bindValue(':email',$email);
          
            $sth->execute();
            print_r($row=$sth->fetch());
            
            $sth = $db->prepare("update professeur set mdp=:mdp where email=:email");
            $sth->bindValue(':email',$email);
            $sth->bindValue(":mdp",$pass1);
            $sth->execute();
            $sth2 = $db->prepare("delete from reset_psswd_tempe where email=:email");
            $sth2->bindValue(':email',$email);

            $sth2->execute();
            
          header('location:https://gestiondepartementsfsjesas.click/index.php?message=votre mot de passe a ete bien modifiee');
            
        }
        else{
            header('location:resetPassword.php?message=password dosent match');
        }
    }
    else{
       header('location:resetPassword.php?message=champs vide');  
    }
    
}


?>