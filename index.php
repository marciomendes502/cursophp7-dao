<?php

require_once("config.php");

// carrega somente um usuario
//$usuario = new Usuario();
//$usuario->loadById(3);
//echo $usuario;

// carrega uma lista de usuários

//$lista = Usuario::getList();

//echo json_encode($lista);

// carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("lio");
//echo json_encode($search);

//carrega um usuario usando o login e a senha
$usuario = new Usuario();
$usuario->login("getulio@yahoo.com.br","4444");

echo $usuario;
//primeiro exemplo
/*$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

?>