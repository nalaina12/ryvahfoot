<!DOCTYPE html>
<html>

<head>
    <title>Titre</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/StyleTournoi.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asserts/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <meta charset="utf-8">
    <script src="../scripts/bootstrap.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/drop.js"></script>
    <style>
        body {
            font-style: normal;
            font-weight: bold;
            font-family: "Arial";
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <div>
        <?php include('../ressources/header.php') ?>
    </div>
    <div>
        <?php include('../ressources/menu.php') ?>

    </div>
    <div>
        <?php include('../ressources/contenu.php'); ?>
        <?php include('../src_club/creerClub.php'); ?>

</body>

</html>