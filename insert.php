<?php
  include_once("libreria.php");

  $id = $_POST['txtId'];
  $nombre = $_POST['txtNombre'];
  $apellidos = $_POST['txtApellido'];
  $correo = $_POST['txtCorreo'];
  $id_turno = $_POST['txtTurno'];
  
  if ($_POST['txtId'] == ''){
    $sql_command = "insert into personas (apellidos, nombre, correo, id_turno) value ('$nombre', '$apellidos', '$correo', '$id_turno' );";
  } else {
    $sql_command = "update personas set apellidos='$apellidos', nombre='$nombre', correo='$correo', id_turno=$id_turno where id=$id;";
  }
  
  echo "$sql_command <br>";

  base_ejecutar($sql_command);

  mail($correo,"Suscripcion", "Bienvenido $nombre $apellidos");

	header('location: muestra.php');

?>
