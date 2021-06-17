<?php

  require 'database.php';
  session_start();
  $users=null;
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password, admin FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $users = $results;
    
}
	$records = $conn->prepare('SELECT * FROM Moroleon where id=1');
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user = null;
    if (Count($results) > 0) {
      $user = $results;
	}
	$records = $conn->prepare('SELECT * FROM Moroleon where id=2');
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user2 = null;
    if (Count($results) > 0) {
      $user2 = $results;
    }
    $records = $conn->prepare('SELECT * FROM Moroleon where id=3');
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user3 = null;
    if (Count($results) > 0) {
      $user3 = $results;
    }
    $records = $conn->prepare('SELECT * FROM Moroleon where id=4');
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user4 = null;
    if (Count($results) > 0) {
      $user4 = $results;
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	    <title>Moroleón</title>
    </head>
    <body>
	<?php require 'partials/header.php' ?>
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
    <div class="row mt-5" >
    <div class="col-md-6">
                <div class="card text-white">
                    <img src="../img/mc1.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-img-overlay d-flex align-items-end">
                        <div class="card-body" style="background-image: linear-gradient(rgba(252, 252, 252, 0.1),rgba(32, 32, 32, 0.8));">
                            <h3 class="card-title">  <?= $user['nombre']; ?>  </h3>
                            <div class="mb-1 text-muted"> <?= $user['direccion']; ?>   </div>
                            <p class="card-text mb-2">  <?= $user['descripcion']; ?>   </p>
                            <?php if($users['admin']==1): ?>
                                <a href="editarMoroleon.php">Editar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

			
            <div class="col-md-6">
                <div class="card text-white">
                    <img src="../img/mc3.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-img-overlay d-flex align-items-end">
                        <div class="card-body" style="background-image: linear-gradient(rgba(252, 252, 252, 0.1),rgba(32, 32, 32, 0.8));">
                            <h3 class="card-title">  <?= $user3['nombre']; ?>  </h3>
                            <div class="mb-1 text-muted"> <?= $user3['direccion']; ?>   </div>
                            <p class="card-text mb-2">  <?= $user3['descripcion']; ?>   </p>
                            <?php if($users['admin']==1): ?>
                                <a href="editarMoroleon.php">Editar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white">
                    <img src="../img/mc4.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-img-overlay d-flex align-items-end">
                        <div class="card-body" style="background-image: linear-gradient(rgba(252, 252, 252, 0.1),rgba(32, 32, 32, 0.8));">
                            <h3 class="card-title">  <?= $user4['nombre']; ?>  </h3>
                            <div class="mb-1 text-muted"> <?= $user4['direccion']; ?>   </div>
                            <p class="card-text mb-2">  <?= $user4['descripcion']; ?>   </p>
                            <?php if($users['admin']==1): ?>
                                <a href="editarMoroleon.php">Editar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-white">
                    <img src="../img/mc2.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-img-overlay d-flex align-items-end">
                        <div class="card-body" style="background-image: linear-gradient(rgba(252, 252, 252, 0.1),rgba(32, 32, 32, 0.8));">
                            <h3 class="card-title">  <?= $user2['nombre']; ?>  </h3>
                            <div class="mb-1 text-muted"> <?= $user2['direccion']; ?>   </div>
                            <p class="card-text mb-2">  <?= $user2['descripcion']; ?>   </p>
                            <?php if($users['admin']==1): ?>
                                <a href="editarMoroleon.php">Editar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>
	
    </body>
</html>