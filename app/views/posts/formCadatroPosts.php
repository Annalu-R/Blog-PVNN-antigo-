<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Cadastro de posts</h2>
<p>

<form action="./PostsController.php?action=create" method="POST">
    
	Autor: <input type="text" name="autor">
	<br>
	Título: <input type="text" name="titulo">
	<br>
	Texto: <input type="text" name="texto">
	<br>
	Comentários: <input type="text" name="comentarios">
	<br>
	Likes: <input type="text" name="likes">
	<br>
	Tipo de Postagem: <input type="text" name="tipoPostagem">
	<br>
	Livro: <input type="text" name="livro">
	<br>
	
	<input type="submit" value="Cadastrar">
	<input type="reset" value="Limpar">
</form>		

</body>
</html>
