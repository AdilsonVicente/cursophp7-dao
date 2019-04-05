<?php
    require_once("config.php");
    //carrega um usuario
    //$teste = new Usuario();
    //$teste->loadById(3);

   // $teste = Usuario::getLista();

    //echo json_encode($teste);

  // $busca = Usuario::search("an");
   // echo json_encode($busca);

   //criando um novo usuario
  /* $teste = new Usuario("brenda", "lara");
  
   $teste->insert();
    */
    $teste = new Usuario();

    $teste->loadById(6);
    $teste->update("suzi", "lara");

    echo $teste;
?>