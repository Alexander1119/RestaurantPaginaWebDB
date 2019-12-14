<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO client (first_name,last_name,email, password) VALUES (:first_name,:last_name,:email, :password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Se ha create existosamente un nuevo usuario';
    } else {
      $message = 'Lo sentimos se ha presentado un problema';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
     <Style>
/****Estilos form*****/
/* Input Forms*/

input[type="text"],
input[type="password"] {
    outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 2px solid #eee;
    margin: 20px auto;
}

input[type="submit"] {
    padding: 10px;
    color: #fff;
    background: #000;
    width: 320px;
    margin: 20px auto;
    margin-top: 0;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #eee;
    color: #000;

}


    </Style>
</head>
<body>
<header class="header">
        <div class="contenedor">
            <img src="img/logo.jpg" alt "" title="" width="" class="logo">
                <h1 class="titulo">Registrarse</h1>
                <nav class="nav" id="nav">
                <ul class="menu">
                    <li class="menu__item"><a href="iniciarsesion.php" class="menu__link">Iniciar Sesion</a></li>
                    <li class="menu__item"><a href="registrarse.php" class="menu__link">Registrarse</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

  
<div ALIGN="CENTER">

<form action="registrarse.php" method="POST">
      <input name="first_name" type="text" placeholder="Ingresar nombre">
      <input name="last_name" type="text" placeholder="Ingresar apellido">
      <input name="email" type="text" placeholder="Ingresar correo">
      <input name="password" type="password" placeholder="Ingresar contraseña">
      <input name="confirm_password" type="password" placeholder="Confirmar contraseña">
      <input type="submit" value="Submit">
    </form>
</div>
    


</body>
</html>