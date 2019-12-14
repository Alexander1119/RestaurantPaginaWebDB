<?php
include("db.php");
$title = '';
$description= '';
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM plate WHERE id_plate=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['name_plate'];
    $description = $row['price'];
  }
}
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];
  $query = "UPDATE plate set name_plate = '$title', price = '$description' WHERE id_plate=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}
?>
<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/estilos2.css">
 
  <title>  </title>
</head>
<body>
<div class="title" ALIGN = "CENTER">
        <h1 class="tituloh1" ALIGN="CENTER">EDITAR</h1>
</div>
<div class="">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="" ALIGN="CENTER">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="inputform" value="<?php echo $title; ?>" placeholder="Actualizar nombre del plato">
        </div>
        <div class="form-group">
        <textarea name="description" class="inputform" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <div ALIGN = "CENTER">
        <button class="boton" name="update">
          Actualizar
        </div>
        
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
</body>
</html>