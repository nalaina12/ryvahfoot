<?php
    setcookie('pseudo', 'M@teo21', time() + 365*24*3600, null, null,
    false, true); // On écrit un cookie
    setcookie('pays', 'France', time() + 365*24*3600, null, null, false,
    true); // On écrit un autre cookie...
// Et SEULEMENT MAINTENANT, on peut commencer à écrire du code html
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ma super page PHP</title>
</head>
<body>
etc.
<p>
    Hé ! Je me souviens de toi !<br />
    Tu t'appelles <?php echo $_COOKIE['pseudo']; ?> et tu viens de
    <?php echo $_COOKIE['pays']; ?> c'est bien ça ?
</p>
