<?php
include('../settings/dbconfig.php');
 require('../vendor/autoload.php');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if (isset($_POST['submit'])) {
   
    $stmt = $db->prepare("select * from professeur where email=:email");
    $stmt->bindParam(':email', $_POST['Email']);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETH_ASSOC);
    if(!empty($row)){

    }
    else{

    }
       $nomPrenom=htmlspecialchars($_POST['NomPrenom']) ;
       $Age=htmlspecialchars($_POST['Age']) ;
       $Email= htmlspecialchars($_POST['Email']);
       $Grade=htmlspecialchars($_POST['Grade']);
       $Type= htmlspecialchars($_POST['Type']);
       $Anciennete=htmlspecialchars($_POST['Anciennete']);
       $specialite=htmlspecialchars($_POST['Specialite']);
       $pwd=$_POST['NomPrenom'].'fesjesAinSebaa2022';
       $password=htmlspecialchars(password_hash($pwd, PASSWORD_DEFAULT));
       $etabissement="fsjes ain sebaa";
       $equipePedagogique=htmlspecialchars($_POST['EquipePedagogique']);
       $cin=htmlspecialchars($_POST['CIN']);
       $image=$_FILES['Photo']['name'];
       $target="../images/";
       $cvDir="../CVs/";
       $pname=$_FILES['cv']['name'];
       $tname=$_FILES['cv']['tmp_name'];
       $stmt1=$db->prepare("select * from professeur where email=:email");
       $stmt1->bindParam(':email', $Email);
       $stmt1->execute();


       $row   = $stmt1->fetchAll();
       if (empty($row)) {
        $stmt = $db->prepare("INSERT INTO professeur (nomPrenom_prof,email,mdp,Image,Age,specialite,grade,anciennete,type_prof,etablissement,id_equipe,CIN_prof,cv_prof) VALUES (:NomPrenom,:Email,:Password,:Image,:Age,:Specialite,:Grade,:Anciennete,:Type,:Etablissement,:id_equipe_pedagogique,:CIN,:cv_prof)");
        $stmt->bindParam(':NomPrenom', $nomPrenom);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Password', $password);
        $stmt->bindParam(':Age', $Age);
        $stmt->bindParam(':Specialite', $specialite);
        $stmt->bindParam(':Grade', $Grade);
        $stmt->bindParam(':Anciennete', $Anciennete);
        $stmt->bindParam(':Type', $Type);
        $stmt->bindParam(':Etablissement', $etabissement);
        $stmt->bindParam(':id_equipe_pedagogique', $equipePedagogique);
        $stmt->bindParam(':CIN', $cin);
        $stmt->bindParam(':Image', $image);
        $stmt->bindParam(':cv_prof', $pname);
        $stmt->execute();
      
         move_uploaded_file($_FILES['cv']['tmp_name'],$cvDir.$_FILES['cv']['name']);
         move_uploaded_file($_FILES['Image']['tmp_name'],$target.$_FILES['Photo']['name']);
         
        $mail= new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';
        
    
        $mail->CharSet="UTF-8";
        $mail->SMTPAuth = true;
        $mail->Username = 'elmehdi99elhamine@gmail.com';
        $mail->Password = 'ozvbmcdroouvuxma';
        $mail->setFrom('sender@example.com');
        $mail->addAddress($Email);
        $mail->SMTPSecure = 'tls'; 
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        $mail->Port= 587;
        
        $mail->Subject = 'Your login credentials';
        $mail->Body    = '<h2>Bienvenue</h2><p>Vous pouvez utilisez votre email:'.$Email.' et le mot de passe suivant pour se connecter</p>
        <p>mot de passe:'.$pwd.'</p>';
        $mail->isHTML(true);
        if (!$mail->send()) {
        echo $mail->ErrorInfo;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
       }
    else{
            header('Location: ' . $_SERVER['HTTP_REFERER'].'?message=utilisateur exist deja');
        }

 }
?>