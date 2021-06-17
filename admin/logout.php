<?php

session_start();
session_unset();
session_destroy();
//header('Locationn: /php-login');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-wicth, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	    <link rel="stylesheet" type="text/css" href="css/estilo.css">
	    <title>Log Out</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    
        <a href="../index.php">Regresar</a>
    </body>
</html>
