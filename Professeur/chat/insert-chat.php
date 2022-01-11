<?php 
    session_start();
    if(isset($_SESSION['professeur']['id_prof'])){
        include_once "../../settings/dbconfig.php";
        $outgoing_id = $_SESSION['professeur']['id_prof'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        if(!empty($message)){
            $sql = $db->prepare( "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, status)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '1')") or die();
            $sql->execute();
        }
    }else{
        // header("location: ../login.php");
    }


    
?>