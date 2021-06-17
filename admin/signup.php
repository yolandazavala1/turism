<?php
session_start();
  require 'database.php';
  $users=null;
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password, admin FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $users = $results;
    
}
  $message = '';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
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

<body class="signup">

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
                    <h3>Signup or <a href="login.php">Login</a></h3>
                </div>
                <div class="card-body">
                    <form action="signup.php" method="post"> 
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
                            <input type="submit" value="Registrar" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>