<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Cadastro de categorias</h2>
<p>

<form action="./CatController.php?action=create" method="POST">
    
	Tipo: <input type="text" name="tipo">
	<br>
	Tag: <input type="text" name="tag">
	<br>
	
	
	<input type="submit" value="Cadastrar">
	<input type="reset" value="Limpar">
</form>		

</body>
</html>
