<?php

require_once("config.php");

// carrega somente um usuario
//$usuario = new Usuario();
//$usuario->loadById(3);
//echo $usuario;

// carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista); // tranforma indice e valores associados em json_encode

// carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("lio");
//echo json_encode($search);

//carrega um usuario usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("getulio@yahoo.com.br","4444");

//echo $usuario;
//primeiro exemplo
/*$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

// aqui foi feito a inserção de um aluno
$aluno = new Usuario("marciomendes", "@123@");
$aluno->setDeslogin("marciomendes");
$aluno->setDessenha("@123@");
$aluno->insert();
echo $aluno;

// aqui vai ser feita a atualização do aluno
/*$aluno = new Usuario();
$aluno->loadById(10);
$aluno->update('virgilio@gmail.com','@sertao@');
echo $aluno;*/

// aqui vamos deletar um aluno

$aluno = new Usuario();

$aluno->loadById(9);
$aluno->delete();
echo $aluno;

?>