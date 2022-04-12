<?php
 session_start();
 include('../includes/funciones.php');

 if(isset($_POST["usuario"]) && isset($_POST["contrasena"])){
    $u = anti_injection_texto($_POST["usuario"]);
    $p = anti_injection_texto($_POST["contrasena"]);

    $verifica = anti_injection($u, $p);
    if($verifica){
        $bandera = informacion_registro_query("SELECT * FROM usuarios WHERE usuario = '".$u."' AND password = MD5('".$p."')");
        if($bandera!='' && !empty($bandera)){
          $_SESSION["autenticado_e"] = md5("usuario_e_true");
          $_SESSION["usuario_empresa"] = $_POST["usuario"];
          $_SESSION["id_empresa"] = $bandera['id_empresa'];
          echo "listo";
        }else{
            echo "error";
        }
    }
    
}

?>