<?php 
require_once("config.php");

//$dados['id'] = "3";
$dados['nome'] = "jose";
$dados['email'] = "daniel";
$dados['senha'] = "1111";
$dados['cpf'] = "111";
$dados['telefone'] = "111111111";
$dados['permissao'] = '2';




//$usuario = new Usuario();
//$usuario->insert($dados);
//echo $usuario;

$usuario = Usuario::select();
echo json_encode($usuario);

 ?>