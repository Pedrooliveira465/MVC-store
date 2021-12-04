<?php

$router = [
    "Inicio"=>'main@index',
    'loja' => 'main@loja'
];

$acao = "Inicio";

if(isset($_GET['a'])){

    if(!key_exists($_GET['a'], $router)){

        $acao = "Inicio";

    }
    else{

        $acao = $_GET['a'];
    }

}

$partes = explode("@", $router["$acao"]);
$controlador = "core\\controller\\".ucfirst($partes[0]);
$metodo = $partes[1];
$qualquer = new $controlador();
$qualquer->$metodo();
