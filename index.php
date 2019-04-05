<?php
    require_once("config.php");

    $teste = new Usuario();

    $teste->loadById(3);

    echo $teste;
?>