<?php
  session_start();
  require 'database.php';
  echo $_SESSION['user_id'];
  if(isset( $_SESSION['user_id'])){
    $records = $conn->prepare('select id, email, password from users
    where id=:id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    echo"1";
    $user = null;
    if(count($results)>0){
        echo"2";
        $user = $results;
    }
  } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

</head>
<body>
    <?php require 'partials/header.php' ?>
    <?php if(!empty($user)): ?>
    <br>Welcome <?= $user['email'] ?>
    <br> You are succesfuly
    <a href="logout.php"></a>
    <?php else: ?>
    <br>NEl
    <?php endif; ?>
</body>
</html>