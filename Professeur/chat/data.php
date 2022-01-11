<script >   
            if(window.location.href.indexOf('acceuil_prof') !== -1) {
                <?php $href = "acceuil_prof" ?> 
           
          
            }

<?php

    // include_once "../../settings/dbconfig.php";
    
     foreach ($row as $row) 
    {
        $sql2 = $db->prepare("SELECT * FROM messages WHERE (incoming_msg_id = {$row['id_prof']}
                OR outgoing_msg_id = {$row['id_prof']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");
        $sql2->execute(); 
        $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
        $count=$sql2->rowCount();
        
        ($count > 0) ? $result = $row2['msg'] : $result ="Aucun message disponible";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "hors ligne") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['id_prof']) ? $hid_me = "hide" : $hid_me = "";


        $output .= '<a href="'.$href.'.php?id_prof='. $row['id_prof'] .'#myModal2"  >
                    <div style="float:left" class="content">
                    <img src="../images/'.$row['Image'].'" alt="">
                    <div class="details">
                        <span>'. $row['nomPrenom_prof'].'</span> 
                        '.unseen_message($row['id_prof'], $_SESSION['professeur']['id_prof'], $you, $msg, $db).' 

                    </div>
                    </div>
                    <div style="float:right; margin-right:7%; padding-top:8%;" class="status-dot '. $offline .'">
                        <i class="fas fa-circle"></i>
                    </div>
                   
                    
                </a>';


            
    }
?>
</script>

