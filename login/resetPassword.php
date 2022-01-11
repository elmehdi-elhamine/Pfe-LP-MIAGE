<?php
include('../settings/dbconfig.php');
if(isset($_GET['email']) && isset($_GET['key'])){
    $key=$_GET['key'];
    $email=$_GET['email'];
    $curDate=date("Y-m-d H:i:s");
    $sth = $db->prepare("select * from reset_psswd_tempe where email=:email and cle=:cle");
	$sth->bindValue(':email', $email);
    $sth->bindValue(':cle', $key);
    $sth->execute();
    $result=$sth->fetch();
    if(!empty($result)){
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <div class="container-fluid mx-auto">
        <div class="card  ">
          <div class="card-body ">
          <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
              <h5 class="card-title">Formulaire de reinitialisation de mot de passe</h5>
              <form action="updatePassword.php" id="form" class="shadow p-3 mb-5 bg-white rounded" method="post">
              <div class="form-group">
                  <label for="pwd">Email:</label>
                <input type="email" readonly class="form-control" value="<?= $email?>" placeholder="Enter password" name="email" id="email">
              </div>
              <div class="form-group">
                <label for="pwd">Nouveau mot de passe:</label>
                <input type="password" required class="form-control" placeholder="Enter password" name="password1" id="pwd">
              </div>
              <div class="form-group">
                <label for="pwd">Confirmer votre mot de passe:</label>
                <input type="password" required class="form-control" placeholder="Enter password" name="password2" id="pwd2">
                <span id='message'></span>
              </div>
              
              <button type="submit" disabled  id="submit-button" name="submit" class="btn btn-primary">Reinitialiser</button>
            </form>
              </div>
          </div>

      </div>
          </div>
        </div>
        <script>
     $('#pwd, #pwd2').on('keyup', function () {
  if ($('#pwd').val() == $('#pwd2').val()) {
    $('#message').html('Correspond').css('color', 'green');
    $('#submit-button').prop('disabled', false);
  } else 
    $('#message').html('Ne Correspond pas').css('color', 'red');
   
    
});
        </script>
        <script>
          $(document).ready(function(){
   $('#pwd, #pwd2').on("cut copy paste",function(e) {
      e.preventDefault();
   });
});
        </script>
          
        <?php
    }

}


?>