<?php
  require 'database.php';
  $message = '';
  if (!empty($_POST['nombre'])) {
    $sql = "INSERT INTO prueba (nombre) VALUES (:nombre)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
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


    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="../css/all.css">

    <!--Custom styles-->
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="signup">

<?php require 'partials/header.php' ?>

<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>
    <div class="container login-form">
        <div class="d-flex justify-content-center h-100">
            <div class="card card-login">
                <div class="card-header text-center">
                    <h3>Insertar</h3>
                </div>
                <div class="card-body">
                    <form action="insertar.php" method="post"> 
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nombre" placeholder="nombre">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Insertar" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>