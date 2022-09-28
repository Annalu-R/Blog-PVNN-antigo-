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

	$cat = $data['cat'];
?>
<h2>Editar categorias </h2>

<p/>
	<form action="./CatController.php?action=update&idCat=<?= $cat->getIdCat()?>" method="POST">
		Tag: <input type="text" name="tag" value="<?= $cat->getTag(); ?>">
		
		<br>
		Tipo: <input type="text" name="tipo" value="<?= $cat->getTipo(); ?>">
		
	
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>		

</body>
</html>
