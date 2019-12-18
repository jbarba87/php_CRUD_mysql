<?php

  include_once("config.php");
  
  function base_consultar($sql){
    
    $cnx = mysqli_connect(HOST,USER,PASS,BASE,PORT) or die("Ocurrio un error al conectar con la BD.");
  	mysqli_query($cnx,"set names utf8");
    $bolsa = mysqli_query($cnx, $sql);

	  $datos = array();
	  while ( $f = mysqli_fetch_array($bolsa) ){
		  $datos[] = $f;
	  }

    mysqli_close($cnx);
    return $datos;
  }

  function base_ejecutar($sql){
    $cnx = mysqli_connect(HOST,USER,PASS,BASE,PORT) or die("Ocurrio un error al conectar con la BD.");
   	mysqli_query($cnx,"set names utf8");
	  $exito = mysqli_query($cnx, $sql);
    mysqli_close($cnx);
	  return $exito;
  }

?>
