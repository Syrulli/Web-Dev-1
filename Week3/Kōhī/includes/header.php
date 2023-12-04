<?php 
    session_start();
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="admin/lib/css/bs.css">
        <link rel="stylesheet" href="admin/lib/css/my_style.css">
        <link rel="icon" href="img/logo.png">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        <!-- <title>Kōhī</title> -->
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <?php include('navbar.php'); ?>
        <main>
            <section class="mt-lg-5">

            