<?php

  include_once("libreria.php");

  if (isset($_GET['id'])){
  
    $id = $_GET['id'];
    
    $sql_command = "select * from personas where id=$id;";
  
    $data = base_consultar($sql_command);
    $d = $data[0];
  
  } else {
    $d[0] = "";
    $d[1] = "";
    $d[2] = "";
    $d[3] = "";
    $d[4] = "";
  }

  
  // Lectura de base de datos para horarios
  
  $sql_command = "select * from turnos";
  
  $data = base_consultar($sql_command);
  
  $t = $data;

?>


<html>
  <head>
    <title> Formulario </title>
  </head>

  <body>
  
    <form action="insert.php" method="POST" style="text-align:center; padding:10px;" >

      Id <input type="text" name="txtId" value="<?=$d[0]?>" readonly><br>
      Nombre <input type="text" name="txtNombre" value="<?=$d[1]?>" required><br>
      Apellido <input type="text" name="txtApellido" value="<?=$d[2]?>" required><br>
      Correo <input type="email" name="txtCorreo" value="<?=$d[3]?>" required><br>

      <select name="txtTurno">
        <option> </option>
        <?php foreach ($data as $t) { ?>
          <option value="<?= $t[0] ?>" <?= $d[4]==$t[0]? "selected": "" ?> > <?= $t[1] ?> </option>
        <?php } ?>
      </select>
      
      <input type="submit" value="Registar">
    </form>  
  </body>
</html>
