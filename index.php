<?php

require_once("config.php");


$usuario = new Usuario();

$usuario->loadById(3);

echo $usuario;

/*$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

?>