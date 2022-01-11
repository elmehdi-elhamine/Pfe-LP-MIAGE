<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="css/style.css">

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
			      			<h3 class="mb-4">Connexion</h3>
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
										<a style="color: white;"data-toggle="modal" data-target="#myModal" href="#">Mote de passe oublié</a>
									</div>
		            </div>
		          </form>
		          
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form method="post" action="password-reset-code.php">
       <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
  </div>
   <button type="submit" name="PasswordReset" class="btn btn-primary">Submit</button>
   </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

