<?php
  // BD
<<<<<<< HEAD
  // local
  // $usuario = "root";
  // $base = "monitor_cfdi";
  // $contrasena = "";

  // Server
  $usuario = "intoit_monitor";
  $base = "intoit_monitor_cfdi";
  $contrasena = "lu=GZNOFBi3E";

=======
  $usuario = "root";
  $base = "monitor_cfdi";
  $contrasena = "";
>>>>>>> 73f48fb (Archivo Prueba)
  global $dbcon;
  $dbcon = new mysqli("localhost",$usuario,$contrasena,$base) OR die ("Error al conectar con la base de datos");  
  mysqli_set_charset($dbcon, 'utf8');    
  date_default_timezone_set("America/Mexico_City");
  //Paths locales
<<<<<<< HEAD
  // $path_file = "C:/xampp/htdocs/monitor/cfdi/"; 
  // $path_file2 = "C:/xampp/htdocs//monitor_web/archivos/"; 
  // $path_pdf = "http://".$_SERVER['HTTP_HOST']."/monitor/cfdi/";

  //Paths remotas
  //echo "ruta->".__DIR__;
  $path_file = "/home/intoit/public_html/monitor/cfdi/"; 
  $path_file2 = "/home/intoit/public_html/monitor_web/archivos/"; 
  $path_pdf = "http://".$_SERVER['HTTP_HOST']."/monitor/cfdi/";
=======
  //$path_app = "http://".$_SERVER['HTTP_HOST']."/i-vinculacion/upv/";  //ruta micrositio
  //$path_appg = "http://".$_SERVER['HTTP_HOST']."/i-vinculacion/"; //ruta global
  //Paths remotas
  $path_file = "C:/xampp/htdocs/monitor/cfdi/"; 
  $path_file2 = "C:/xampp/htdocs//monitor_web/archivos/"; 
>>>>>>> 73f48fb (Archivo Prueba)


?>

