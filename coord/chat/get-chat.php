<?php 
    session_start();
    if(isset($_SESSION['coordFiliere']['id_prof'])){
        include_once "../../settings/dbconfig.php";
        $outgoing_id = $_SESSION['coordFiliere']['id_prof'];
        $incoming_id =  $_POST['incoming_id'];
        $output = "";
        $sql = $db->prepare("SELECT * FROM messages LEFT JOIN professeur ON professeur.id_prof = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");

        $sql->execute(); 
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count=$sql->rowCount();

        if($count > 0){
            foreach($row as $row){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details" title="'.$row['date_msg'].'">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming" >
                                <img src="../images/'.$row['Image'].'" alt="">
                                <div class="details" title="'.$row['date_msg'].'">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">Aucun message n’est disponible. Une fois que vous envoyez le message, il s’affiche ici.</div>';
        }
        echo $output;
    }else{
        // header("location: ../login.php");

        echo 'erreuuuuuuuuuuuuer' ;    }

    $query = "UPDATE messages SET status = '0' WHERE incoming_msg_id = '".$outgoing_id."' AND outgoing_msg_id = '".$incoming_id."' 
                  AND status = '1'";
        $statement = $db->prepare($query);
        $statement->execute();

?>