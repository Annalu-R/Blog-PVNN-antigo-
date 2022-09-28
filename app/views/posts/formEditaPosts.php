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

	$posts = $data['posts'];
?>
<h2>Editar posts</h2>

<p/>
	<form action="./PostsController.php?action=update&idPosts=<?= $posts->getIdPosts()?>" method="POST">
		Autor: <input type="text" name="autor" value="<?= $posts->getAutor(); ?>">
		
		<br>
		Texto: <input type="text" name="texto" value="<?= $posts->getTexto(); ?>">
		
		<br>
		Comentários: <input type="text" name="coemntarios" value="<?= $posts->getComent(); ?>">
		
		<br>
		Likes: <input type="text" name="likes" value="<?= $posts->getLikes(); ?>">
		<br>
		
		Tipo de Postagem: <input type="text" name="tipoPostagem" value="<?= $posts->getTpPosts(); ?>">
		<br>
		
		Livro: <input type="text" name="livro" value="<?= $posts->getLivro(); ?>">
		<br>

	
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>		

</body>
</html>
