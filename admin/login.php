<?php
 session_start();

 if (isset($_SESSION['user_id'])) {
   //header('Locationn: /php-login');
 }
 require 'database.php';

 if (!empty($_POST['email']) && !empty($_POST['password'])) {
   $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
   $records->bindParam(':email', $_POST['email']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);

   $message = '';

   if ($_POST['password']==$results['password']) {
     $_SESSION['user_id'] = $results['id'];
     //header("Location: /php-login");
   } else {
     $message = $results['password'].$results['password'];
   }
 }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="../css/all.css">

    <!--Custom styles-->
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="login">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="collapse navbar-collapse" id="navbarMenu">
			    <ul class="navbar-nav mr-auto">
				    <li class="nav-item">
					    <a href="../index.php" class="nav-link">Inicio</a>
				    </li>
				    <li class="nav-item">
					    <a href="Moroleon.php" class="nav-link">Municipio de Moroleón</a>
				    </li>
				    <li class="nav-item">
					    <a href="Uriangato.php" class="nav-link">Municipio de Uriangato</a>
				    </li>
				    <li>					
					    <a href="Yuriria.php" class="nav-link">Municipio de Yuriria</a>
				    </li>
            <li>					
					    <a href="Acambaro.php" class="nav-link">Municipio de Acambaro</a>
				    </li>
            <li>
              <?php if(!empty($user)): ?>
                <?=  $user ['email']?>
                <a href="logout" class="nav-link">LogOut</a>
              <?php else: ?>
                <a href="login.php" class="nav-link">Login</a>
              <?php endif; ?>
            </li>				
			    </ul>
		    </div><!--Fin de div de collapse navbar-collapse-->
        </nav><!--Fin de Nav-->
<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>
    <div class="container login-form">
        <div class="d-flex justify-content-center h-100">
            <div class="card card-login">
                <div class="card-header text-center">
                    <h3>Login or <a href="signup.php">SignUp</a></h3>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post"> 
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="usuario">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="contraseña">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Entrar" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
                <div class="alert alert-danger" role="alert" <?php  if (isset($mensaje)) { echo "hidden"; }   ?>hidden>Email o Contraseña incorrectos</div>
            </div>
        </div>
    </div>
</body>

</html>