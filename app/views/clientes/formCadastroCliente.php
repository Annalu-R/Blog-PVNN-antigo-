<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Cadastro de clientes</h2>
<p/>
<form action="./ClienteController.php?action=create" method="POST">
	Nome: <input type="text" name="nome">
	<br>
	Telefone: <input type="text" name="telefone">
	<br>
	Email: <input type="text" name="email">
	<p/>
	<input type="submit" value="Cadastrar">
	<input type="reset" value="Limpar">
</form>		

</body>
</html>