<?php   
  include('config.php'); 



  function anti_injection_texto($sql) {

     $sql = preg_replace(my_sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);

     $sql = trim($sql);

     $sql = strip_tags($sql);

     $sql = addslashes($sql);

     return $sql;

  }

  function seg_a_min($tiempo_en_segundos){

  	$horas = floor($tiempo_en_segundos / 3600);

    $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);

    $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

    $cadena = '';

    if($horas!=0){

      $cadena .= $horas.'hrs. '; 

    }

    if($minutos!=0){

      $cadena .= $minutos.'min. '; 

    }

    if($segundos!=0){

      $cadena .= $segundos.'seg. '; 

    }

    return $cadena;

  }

  function anti_injection( $user, $pass ) { 

    $banlist = array (

            "insert", "select", "update", "delete", "distinct", "having", "truncate", "replace",

            "handler", "like", " as ", "or ", "procedure", "limit", "order by", "group by", "asc", "desc"

    );

    if ( preg_match ( "/[a-zA-Z0-9]+/i", $user ) ) {

            $user = trim ( str_replace ( $banlist, '', strtolower ( $user ) ) );

    } else {

            $user = null;

    }

    if ( preg_match ( "/[a-zA-Z0-9]+/i", $pass ) ) {

            $pass = trim ( str_replace ( $banlist, '', strtolower ( $pass ) ) );

    } else {

            $pass = null;

    }

    $array = array ( 'user' => $user, 'pass' => $pass );

    if ( in_array ( NULL, $array ) ) {

            return false;

    } else {

            return true;

    }

  }

  function my_sql_regcase($str){

      $res = ""; 

      $chars = str_split($str);

      foreach($chars as $char){

          if(preg_match("/[A-Za-z]/", $char))

              $res .= "[".mb_strtoupper($char, 'UTF-8').mb_strtolower($char, 'UTF-8')."]";

          else

              $res .= $char;

      }

      return $res;

  }  

  function fecha_letra($fecha){

    $arreglo = explode('-',$fecha);

    $ano = $arreglo[0];

    if($arreglo[1]=='01'){ $mes = 'Enero'; }

    if($arreglo[1]=='02'){ $mes = 'Febrero'; }

    if($arreglo[1]=='03'){ $mes = 'Marzo'; }

    if($arreglo[1]=='04'){ $mes = 'Abril'; }

    if($arreglo[1]=='05'){ $mes = 'Mayo'; }

    if($arreglo[1]=='06'){ $mes = 'Junio'; }

    if($arreglo[1]=='07'){ $mes = 'Julio'; }

    if($arreglo[1]=='08'){ $mes = 'Agosto'; }

    if($arreglo[1]=='09'){ $mes = 'Septiembre'; }

    if($arreglo[1]=='10'){ $mes = 'Octubre'; }

    if($arreglo[1]=='11'){ $mes = 'Noviembre'; }

    if($arreglo[1]=='12'){ $mes = 'Diciembre'; }

    $dia = $arreglo[2];

    $letra = $dia.' de '.$mes.' de '.$ano;

    return $letra;

  }

  function diferencia_dias($inicio, $fin){

    $inicio = strtotime($inicio);

    $fin = strtotime($fin);

    $dif = $fin - $inicio;

    $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);

    return ceil($diasFalt);

  }

  function suma_dia_semana($fecha,$dias){

  	$datestart= strtotime($fecha);

  	$datesuma = 15 * 86400;

  	$diasemana = date('N',$datestart);

  	$totaldias = $diasemana+$dias;

  	$findesemana = intval( $totaldias/5) *2 ; 

  	$diasabado = $totaldias % 5 ; 

  	if ($diasabado==6) $findesemana++;

  	if ($diasabado==0) $findesemana=$findesemana-2;

  	$total = (($dias+$findesemana) * 86400)+$datestart ; 

  	return $twstart=date('Y-m-d', $total);

  }

  function diferencia_dias_habiles($begin_date, $end_date, $type = 'array') {

  	$date_1 = date_create($begin_date);

  	$date_2 = date_create($end_date);

  	if ($date_1 > $date_2) return 0;

  	$bussiness_days = array();

    $conteo = 0;

  	while ($date_1 <= $date_2) {

  		$day_week = $date_1->format('w');

  		if ($day_week > 0 && $day_week < 6) {

  			$bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');

        $conteo++;

  		}

  		date_add($date_1, date_interval_create_from_date_string('1 day'));

  	}

  	if (strtolower($type) === 'sum') {        

  	    array_map(function($k) use(&$bussiness_days) {

  	        $bussiness_days[$k] = count($bussiness_days[$k]);

  	    }, array_keys($bussiness_days));             

  	}

  	return $conteo;

  }

      

	function obtener_nombre_mes($num_mes){

		$mes="";

		if($num_mes=='01'){ $mes = 'Enero'; }

		if($num_mes=='02'){ $mes = 'Febrero'; }

		if($num_mes=='03'){ $mes = 'Marzo'; }

		if($num_mes=='04'){ $mes = 'Abril'; }

		if($num_mes=='05'){ $mes = 'Mayo'; }

		if($num_mes=='06'){ $mes = 'Junio'; }

		if($num_mes=='07'){ $mes = 'Julio'; }

		if($num_mes=='08'){ $mes = 'Agosto'; }

		if($num_mes=='09'){ $mes = 'Septiembre'; }

		if($num_mes=='10'){ $mes = 'Octubre'; }

		if($num_mes=='11'){ $mes = 'Noviembre'; }

		if($num_mes=='12'){ $mes = 'Diciembre'; }

		return $mes;

	}  

  function enviar_mail($para,$asunto,$mensaje){

    require_once('PHPMailer/class.phpmailer.php');

    require_once("PHPMailer/class.smtp.php");    

    $mailWeb = new PHPMailer();    

    $mailWeb->IsSMTP();    

    $mailWeb->SMTPSecure = 'ssl';    

    $mailWeb->Host = "atenea.hosting-mexico.net";    

    $mailWeb->SMTPDebug = 0;        

    $mailWeb->SMTPAuth = true;    

    $mailWeb->Port = 465;    

    $mailWeb->Username = "no-reply@sivve.net";    

    $mailWeb->Password = "=+ApGUi_Slwc";    

    $mailWeb->SetFrom("no-reply@sivve.net", "No Reply");    

    $mailWeb->AddReplyTo("no-reply@sivve.net", "No Reply");    

    $mailWeb->Subject = $asunto;    

    $mailWeb->AltBody = htmlspecialchars_decode($mensaje);        

    $mailWeb->MsgHTML(htmlspecialchars_decode($mensaje));

    $mailWeb->AddAddress($para);

   // $mailWeb->addBCC('scorpion176@gmail.com');

    $mailWeb->CharSet = 'UTF-8';                  

    try{    

      $mailWeb->Send();        

    }catch(Exception $e){

      echo $e;

    }  

  } 

  function insertar_bd($tabla, $atributos){

    global $dbcon;  

    $contador = 0;

    $bandera = false;

    $valor = '';

    $columna = '';

    foreach ($atributos as $k => $v) {

      if($contador==0 && ($contador + 1 == sizeof($atributos))){

        $columna .= "(".$k.")";

        $valor .= "('".$v."')";              

      }else if($contador + 1 == sizeof($atributos)){

        $columna .= ", ".$k.")";

        $valor .= ", '".$v."')"; 

      }else if($contador==0){

        $columna = "(".$k."";

        $valor = "('".$v."'";      

      }else{

        $columna .= ", ".$k."";

        $valor .= ", '".$v."'";

        $bandera = true;

      }

      $contador++;

    }

    $sql = "INSERT INTO ".$tabla." ".$columna." VALUES ".$valor;                      

    //echo 'registro->'. $sql;

    if ($dbcon->query($sql) === TRUE) {

       return $dbcon->insert_id;        

    } else {

       return false;

    }

  } 

  

  function actualizar_bd($tabla, $atributos, $id_columna, $id){

    global $dbcon;  

    $contador = 0;

    $bandera = false;

    $valor = '';

    foreach ($atributos as $k => $v) {

      if($contador + 1 == sizeof($atributos)){

          $valor .= "".$k." = '".$v."'";

        }else{

          $valor .= "".$k." = '".$v."', ";        

        }      

      $contador++;

    }

    $sql = "UPDATE ".$tabla." SET ".$valor." WHERE ".$id_columna." = '".$id."'";                     

    //echo "sql->".$sql; 

    if ($dbcon->query($sql) === TRUE) {

        return true;        

    } else {

        return false;

    }

  } 

  

  function eliminar_bd($tabla, $id_columna, $id){

    global $dbcon;  

    $sql = "DELETE FROM ".$tabla." WHERE ".$id_columna." = '".$id."'";  

    //echo $sql;       

    if ($dbcon->query($sql) === TRUE) {

        return true;        

    } else {

        return false;

    }

  }

  

  function informacion_registro_query($sql){   

   // echo "query->".$sql;

    global $dbcon;

    $resultado = array();             

    $result = $dbcon->query($sql); 

    if ($result->num_rows > 0) {      

      while($row = $result->fetch_assoc()) {         

        $resultado = $row; 

      }

    }

    return $resultado;

  } 

  

  function informacion_registros_query($sql){

    global $dbcon;  

    //echo $sql;   

    $resultado = array();   

    $result = $dbcon->query($sql);

    if ($result->num_rows > 0) {      

      while($row = $result->fetch_assoc()) {

        $resultado[] = $row;

      }

    }

    return $resultado;

  }

  

  function entidades($cadena){

		return htmlentities($cadena,ENT_QUOTES,charset($cadena));

	}

  

	function sin_entidades($cadena){

		return html_entity_decode($cadena,ENT_QUOTES,charset($cadena));

	} 

  

	function charset($cadena){

		return mb_detect_encoding($cadena,"UTF-8,ISO-8859-1");

	}

  

  function fixFilesArray(&$files){

    $names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);

    foreach ($files as $key => $part) {

        $key = (string) $key;

        if (isset($names[$key]) && is_array($part)) {

            foreach ($part as $position => $value) {

                $files[$position][$key] = $value;

            }

            unset($files[$key]);

        }

    }

  }

	

function poner_guion($url){

    $url = strtolower($url);    

    $find = array('�','�','�','�','�','�','�','�','�','�','�','�','�','�');

    $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');

    $url = str_replace($find, $repl, $url);    

    $find = array(' ', '&', '\r\n', '\n','+');

    $url = str_replace($find, '-', $url);    

    return $url;

}     
?>