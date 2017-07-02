<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $titulo ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('mdb/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?= base_url('mdb/css/mdb.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('mdb/css/compiled.min.css') ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?= base_url('mdb/css/style.css') ?>" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
	<?php if(isset($style)) echo $style; ?>
</head>

<body style="background-color: #cccccc;">
