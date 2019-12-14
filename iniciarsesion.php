<?php

  session_start();

  
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM client WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Restaurante/index2.php");
    } else {
      $message = 'Lo sentimos, los datos no coinciden';
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
    color: #eee;
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
                <h1 class="titulo">Iniciar Sesion</h1>
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
<form action="iniciarsesion.php" method="POST">
  <input name="email" type="text" placeholder="Ingrese su correo">
  <input name="password" type="password" placeholder="Ingrese su contraseña">
  <input type="submit" value="Enviar">
</form>
</div>

</body>
</html>