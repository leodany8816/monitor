<?php
  // BD
  $usuario = "root";
  $base = "monitor_cfdi";
  $contrasena = "";
  global $dbcon;
  $dbcon = new mysqli("localhost",$usuario,$contrasena,$base) OR die ("Error al conectar con la base de datos");  
  mysqli_set_charset($dbcon, 'utf8');    
  date_default_timezone_set("America/Mexico_City");
  //Paths locales
  //$path_app = "http://".$_SERVER['HTTP_HOST']."/i-vinculacion/upv/";  //ruta micrositio
  //$path_appg = "http://".$_SERVER['HTTP_HOST']."/i-vinculacion/"; //ruta global
  //Paths remotas
  $path_file = "C:/xampp/htdocs/monitor/cfdi/"; 
  $path_file2 = "C:/xampp/htdocs//monitor_web/archivos/"; 


?>

