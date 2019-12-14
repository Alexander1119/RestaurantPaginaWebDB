<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/estilos2.css">
  <title>Document</title>
</head>
<body>
  

<main class="">
  <div class="">
    <div class="">

    <div class="title" ALIGN = "CENTER">
        <h1 class="tituloh1">AGREGAR PLATO</h1>
    </div>

      <!-- ADD TASK FORM -->
      <div class="formagregar" ALIGN="CENTER">
        <form action="save_task.php" method="POST" ALIGN="CENTER">
          <div class="" ALIGN="CENTER">
            <input type="text" name="title" class="inputform" placeholder="Nombre del plato" >
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="inputform" placeholder="Precio"></textarea>
          </div>
          <div ALIGN = "CENTER">
          <input type="submit" name="save_task" class="boton" value="Guardar">
          
          </div>
          
        </form>
      </div>
    </div>
    <div class="" ALIGN="CENTER">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Plato</th>
            <th>Precio</th>
            
            <th>Editar - Eliminar</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM plate";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name_plate']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id_plate']?>" class="">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id_plate']?>" class="">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('includes/footer.php'); ?>
</body>
</html>


