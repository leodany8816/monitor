<?php
session_start();
include('funciones.php');
$actual = basename($_SERVER['PHP_SELF']);
if (empty($_SESSION["usuario_empresa"]) && empty($_SESSION["usuario_id"])) {
    header('location:index.php');
}

$usuario = $_SESSION["usuario_empresa"] . "<br/>";
$id_empresa =  $_SESSION["id_empresa"];

$empresa = informacion_registro_query("select * from empresas where id_empresa=" . $id_empresa);
$nomEmpresa = $empresa['nombre'];
$logo = $empresa['logo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Web</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="css/datagrid/datatables/datatables.bundle.css" rel="stylesheet">

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="sidebar-brand-text mx-3 page-logo" style="background-color:#fff;">
                        <img src="img/<?= $logo ?>" style="width: 150px; height: 30px;">
                    </div>
                    <button class="ml-2 btn-xs btn btn-outline-secondary waves-effect waves-themed"><?= $nomEmpresa ?></button>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item dropdown no-arrow">
                            <h3 style="font-weight:bold; margin-top:5px"><?= $usuario ?></h3>
                        </li> -->
                        <li class="nav-item dropdown no-arrow"></li>
                        <li class="nav-item dropdown no-arrow">
                            <a href="acciones/logout.php">
                                <img src="css/img/officon.png" style="width: 50px" />
                            </a>
                        </li>
                    </ul>
                </nav>