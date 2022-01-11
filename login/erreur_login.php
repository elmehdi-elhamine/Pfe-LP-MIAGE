<!doctype html>
<?php
session_start()
 ?>
<html lang="en">
  <head>
    <title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style.css">
<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Fonts and icons -->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    </head>
    <body style="background: linear-gradient(to left, #a0d7fd 0%, #016cb6 100%); ">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <strong  style="padding-top: 0px ;"class="heading-section">Université Hassan II de Casablanca (UH2C)</strong>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="wrap d-md-flex">
                        
                            <img class="img" src="images/fac.png">
                 
                        <div style="background-color: #007ded;" class="login-wrap p-4 p-md-5">
            <?php
            if (isset($_GET['message'])) {?>
            <div class="d-flex">
                        <div class="w-100">
                            <h3 style="color: black; font-size: 18px; padding-bottom: 7%;"><?= $_GET['message']?></h3>
                        </div>
              
            <?php } else {?>
              <div class="d-flex">
                        <div class="w-100">
                           <?php
      echo '<div class="alert alert-danger">'.'<i class="fas fa-exclamation-circle">'.'</i>'.'  '."<strong>Erreur!</strong> Le champ email ou mot de passe incorrect.</div>";
    ?>
                        </div>
              
              
              <?php } ?>
          
                  
                    
                    </div>
                            <form action="login.php" class="signin-form" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Email" name="email" required>
                        </div>
                    <div class="form-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">S'authentifier</button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50 text-left">
                            
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a style="color: white;" href="#">Mote de passe oublié</a>
                                    </div>
                    </div>
                  </form>
                  
                </div>
              </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

    </body>
</html>

