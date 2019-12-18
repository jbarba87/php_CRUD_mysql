<?php
  include_once("libreria.php");


  // Borra una entrada de la tabla
  if (isset($_GET['id'])){
    $id = $_GET['id'];
  
    $sql_command = "delete from personas where id=$id;";
    base_consultar($sql_command);
  }

  $sql_command = "select * from personas;";
  
  $datos = base_consultar($sql_command);

  // Si la tabla esta vacia
  if (empty($datos)){

    echo "No hay elementos en la tabla <br>";
    die("<a href=formulario.php> Insertar nuevo elemento </a>");

  } else {
  
    // Leemos la tabla turnos
    $sql_command = "select * from turnos";

    // Los indices de la BD comienzan en 1 y los indices del array comienzan de 0;  
    $data = base_consultar($sql_command);
    $t = $data;
  
  }

?>

<html>
  <head>
    <title> Personas registradas </title>
    <meta charset="utf-8">

  </head>
  <body>

    <table border=1 style="margin:auto;" >
      <tr bgcolor="orange">
        <td style="width:100px;"> Id </td>
        <td style="width:100px;"> Nombre </td>
        <td style="width:100px;"> Apellido </td>
        <td style="width:200px;"> Correo </td>
        <td style="width:100px;"> Turno </td>
        <td style="width:100px;"> Editar </td>
        <td style="width:100px;"> Borrar </td>
      </tr>
      
      <?php foreach ($datos as $d){ ?>

            <tr>
              <td> <?= $d[0] ?> </td>
              <td> <?= $d[1] ?> </td>
              <td> <?= $d[2] ?> </td>
              <td> <?= $d[3] ?> </td>
              <td> <?= $t[$d[4] - 1][1] ?> </td>
              <td> <a href="formulario.php?id=<?=$d[0]?>"> Editar </a> </td>
              <td> <a href="muestra.php?id=<?=$d[0]?>"> Borrar </td>
            </tr>
     <?php } ?>

    </table>
    
    <br>
		<a href=formulario.php> Insertar nuevo elemento </a>
		
    
  </body>

</html>
