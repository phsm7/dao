<?php

require_once("config.php");

// CARREGA UM USUÁRIO
//$root = new Usuario();
//$root->loadById(1);
//echo $root;

// CARREGA UMA LISTA DE USUÁRIOS
//$lista = Usuario::getList();
//echo json_encode($lista);

// CARREGA UMA LISTA DE USUÁRIOS BUSCANDO PELO NOME
//$search = Usuario::search("pe");
//echo json_encode($search);

// CARREGA UM USUÁRIO USANDO NOME E SENHA
$usuario = new Usuario();
$usuario->login("Pedro H", "1234");
echo $usuario;

?>
