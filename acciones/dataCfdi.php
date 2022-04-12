<?php
error_reporting(0);
session_start();
include('../includes/funciones.php');

$cfdis = informacion_registros_query("select * from facturas where id_empresa =" . $_SESSION["id_empresa"]);
$data = array();
foreach ($cfdis as $cfdi) {
    if ($cfdi['comprobante_TipoDeComprobante'] == "I")
        $tipo = 'Ingreso';
    else
        $tipo = "Egreso";
    $emisor = $cfdi['emisor_Rfc'];
    //extraemos la fecha para la ruta de los archivos
    $ruta = explode('-',$cfdi['fecha_carga']);
    $data[] = array(
        "id_cfdi" => $cfdi["id_factura"],
        "emisor" => $cfdi["emisor_Nombre"],
        "rfcEmisor" => $cfdi["emisor_Rfc"],
        "serie" => $cfdi["comprobante_serie"],
        "folio" => $cfdi["comprobante_folio"],
        "receptor" => $cfdi["receptor_Nombre"],
        "rfcReceptor" => $cfdi["receptor_Rfc"],
        "tipo_comprobante" => $tipo,
        "subTotal" => number_format($cfdi["comprobante_SubTotal"],2),
        "total" => number_format($cfdi["comprobante_Total"],2),
        "ver" => '<a href="'.$path_file.$emisor."/".$ruta[0]."/".$ruta[1]."/".$ruta[2]."/".$cfdi['nombre_pdf'].'" target="_blank"><img src="css/img/pdf_icon.png" /></a>',
        "descargar" =>'<img id='.$cfdi['id_factura'].' class="descargarZip" src="css/img/zip_icon.png" />'
    );
}
$json_data = array("data" => $data);
echo json_encode($json_data, JSON_UNESCAPED_UNICODE);
