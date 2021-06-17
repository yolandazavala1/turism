<?php
  require 'database.php';
  $message = '';
  if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['descripcion'])) {
    $sql = "UPDATE Yuriria set nombre='$_POST[nombre]', direccion='$_POST[direccion]', descripcion='$_POST[descripcion]'  where id='$_POST[id]'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);
    if ($stmt->execute()) {
      $message = 'Successfully ';
    } else {
      $message = 'Sorry ';
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
                    <?php if(!empty($users)): ?>
                <a href="" class="nav-link">Welcome. <?= $users['email']; ?></a> 
                
              <?php endif; ?>
            </li>

            <li>
            <?php if(!empty($users)): ?>
                 
                 <a href="logout.php" class="nav-link">LogOut</a>
               <?php else: ?>
                 <a href="login.php" class="nav-link">Login</a>
               <?php endif; ?>
            </li>	
			    </ul>
		    </div><!--Fin de div de collapse navbar-collapse-->
        </nav><!--Fin de Nav-->
<?php require 'partials/header.php' ?>

<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>
    <div class="container login-form">
        <div class="d-flex justify-content-center h-100">
            <div class="card card-login">
                <div class="card-header text-center">
                    <h3>Editar Moroleon</h3>
                </div>
                <div class="card-body">
                    <form action="editarYuriria.php" method="post"> 
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="id" placeholder="id">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nombre" placeholder="nombre">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="direccion" placeholder="direccion">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Editar" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>