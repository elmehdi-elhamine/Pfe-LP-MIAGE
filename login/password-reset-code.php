<?php
include('../settings/dbconfig.php');
require('../vendor/autoload.php');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if(isset($_POST['PasswordReset']) && !empty($_POST['email'])){
    print_r($_POST);
    $sth = $db->prepare("SELECT * from professeur where email=:email");
	$sth->bindValue(':email', $_POST['email']);
    $sth->execute();
    $resutl=$sth->fetch();
    if(!empty($resutl)){
       $output='';
       $expFormat=mktime(date("H"),date("i"),date("s"),date("m"),date("d")+1);
        $expDate=date("Y-m-d H:i:s",$expFormat);
       $key=md5(time());
       $addKey=substr(md5(uniqid(rand(),1)),3,10);
       $key.=$addKey;
       $sth = $db->prepare("insert into reset_psswd_tempe value(:email,:cle,:expDate)");
       $sth->bindValue(':email', $_POST['email']);
       $sth->bindValue(':cle', $key);
       $sth->bindValue(':expDate', $expDate);
       $sth->execute();
       
       $output.='click on the following link to reset your password';
       $output.='<p><a href=https://gestiondepartementsfsjesas.click/DepartementsFin/login/resetPassword.php?key='.$key.'&email='.$_POST['email'].'&action=reset>Reset your password</a></p>';
        $body=$output;
        $subject='password recovery';
        $emaulTo=$_POST['email'];
        $mail= new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';
        
    
    $mail->CharSet="UTF-8";
$mail->SMTPAuth = true;
$mail->Username = 'elmehdi99elhamine@gmail.com';
$mail->Password = 'ozvbmcdroouvuxma';
$mail->setFrom('sender@example.com');
$mail->addAddress($emaulTo);
$mail->SMTPSecure = 'tls'; 
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->Port= 587;

$mail->Subject = 'reset password link';
$mail->Body    = $output;
$mail->isHTML(true);
if (!$mail->send()) {
echo $mail->ErrorInfo;
}
else{
    header('location:../login/index.php?message=un lien de reinitialisation dot de passe a ete envoyee a votre compte gmail');
}
    }
    else{
        header('location:../login/index.php?message=User not found');
    }

    
}
else{
    header('location:../login/index.php?message=Invalid email');
}


?>