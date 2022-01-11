<?php 
try {
  $db = new PDO('mysql:host=localhost;dbname=dprtm', 'root', '');
  $db->exec("set names utf8");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e) {
  echo "Connection failed : ". $e->getMessage();
}

function unseen_message($from_user_id, $to_user_id, $you, $msg, $db)
{
  $query = "
  SELECT * FROM messages 
  WHERE incoming_msg_id = '$to_user_id'
  AND outgoing_msg_id =  '$from_user_id' 
  AND status = '1'
  ";
  $statement = $db->prepare($query);
  $statement->execute();
  $count = $statement->rowCount();
  $output = '';
  if($count > 0)
  {
    $output = '<p style="color:black; font-weight : 900; font-size:16px;">'.$you.$msg.'</p>';
  }else{
    $output = '<p>'.$you.$msg.'</p>';
  }
  return $output;
}

?>