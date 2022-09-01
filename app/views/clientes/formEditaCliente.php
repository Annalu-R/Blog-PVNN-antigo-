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

	$cliente = $data['cliente'];
?>
<h2>Editar cliente</h2>

<p/>
	<form action="./ClienteController.php?action=update&id=<?= $cliente->getId()?>" method="POST">
		Nome: <input type="text" name="nome" value="<?= $cliente->getNome(); ?>">
		
		<br>
		Telefone: <input type="text" name="telefone" value="<?= $cliente->getTelefone(); ?>">
		
		<br>
		Email: <input type="text" name="email" value="<?= $cliente->getEmail(); ?>">
		
		<p/>
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>		

</body>
</html>