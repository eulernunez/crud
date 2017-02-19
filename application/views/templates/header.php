<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test: Crud con Codeigniter</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css" media="screen" />
        <!-- Internal -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" media="screen" />
    </head>
    <body>
        <section class="container">
            <header class="header">
                <nav class="top_menu">
                    <ul>
                        <li><a href="<?php echo site_url('users'); ?>">Home</a></li>
                        <li><a href="<?php echo site_url('users/create'); ?>">Crear Usuario</a></li>
                    </ul>
                </nav>
            </header>
            <section class="content">

