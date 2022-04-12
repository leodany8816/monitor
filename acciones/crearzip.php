<?php
error_reporting();
session_start();
include('../includes/funciones.php');

$id = $_POST['id'];
$cfdi = informacion_registro_query("select * from facturas where id_factura=" . $id);
$emisor = $cfdi['emisor_Rfc'];
$folio = $cfdi['comprobante_folio'];
$ruta = explode('-', $cfdi['fecha_carga']);
$fileXml = basename($cfdi['nombre_xml']);
$filePdf = basename($cfdi['nombre_pdf']);
$rutaOri = $path_file . $emisor . "/" . $ruta[0] . "/" . $ruta[1] . "/" . $ruta[2] . "/";
$rutaDes = $path_file2;
copy($rutaOri . $fileXml, "$rutaDes" . $fileXml);
copy($rutaOri . $filePdf, "$rutaDes" . $filePdf);

//creamos el zip
$zip = new ZipArchive();
$nameZip = "CFDI-".$emisor."-".$folio.".zip";
if ($zip->open($nameZip, ZipArchive::CREATE) === true) {
    //exit("Error abriendo ZIP en $nameZip");

    $zip->addFile("../archivos/".$fileXml);
    $zip->addFile("../archivos/".$filePdf);
    $resultado = $zip->close();
    copy($nameZip,"../archivos/".$nameZip);
    if ($resultado) {
<<<<<<< HEAD
        echo $nameZip;
=======
        echo "Archivo creado->".$nameZip;
>>>>>>> 73f48fb (Archivo Prueba)
    } else {
        echo "Error creando archivo.>".$nameZip;
    }
    unlink($nameZip);
    unlink("../archivos/".$fileXml);
    unlink("../archivos/".$filePdf);
}else{
    echo "error creando el archivo->".$nameZip;
}
