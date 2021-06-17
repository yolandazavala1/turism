<?php
  require 'database.php';
  $message = '';
  if (!empty($_POST['id']) && !empty($_POST['nombre'])) {
    $sql = "UPDATE prueba set nombre='$_POST[nombre]' where id='$_POST[id]'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
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

<?php require 'partials/header.php' ?>

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
                    <form action="prueba.php" method="post"> 
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