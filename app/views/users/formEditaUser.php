<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 

	$user = $data['user'];
?>
<h2>Editar usuário</h2>

<p>
	<form action="./UserController.php?action=update&id=<?= $user->getId()?>" method="POST">
		Nome: <input type="text" name="nome" value="<?= $user->getNome(); ?>">
		
		<br>
		Telefone: <input type="text" name="telefone" value="<?= $user->getTelefone(); ?>">
		
		<br>
		Email: <input type="text" name="email" value="<?= $user->getEmail(); ?>">
		
		<br>
		Username: <input type="text" name="username" value="<?= $user->getUsername(); ?>">
		<br>
		
		Data de nascimento: <input type="text" name="dtNascimento" value="<?= $user->getDtNasc(); ?>">
		<br>
		
		Senha: <input type="text" name="senha" value="<?= $user->getSenha(); ?>">
		<br>

		Tipo de Uusário: <input type="text" name="tipoUser" value="<?= $user->getTipoUser(); ?>">
		
		<p>
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>		

</body>
</html>
