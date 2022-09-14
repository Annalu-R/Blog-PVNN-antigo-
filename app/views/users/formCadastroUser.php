<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Cadastro de usuários</h2>
<p/>
<form action="./UserController.php?action=create" method="POST">
	Nome: <input type="text" name="nome">
	<br>
	Telefone: <input type="text" name="telefone">
	<br>
	Email: <input type="text" name="email">
	<p/>
	Data de nascimento: <input type="text" name="data de nascimento">
	<p/>
	Username: <input type="text" name="username">
	<p/>
	Senha: <input type="text" name="senha">
	<p/>
	Tipo de Usuário: <input type="text" name="tipo de usuário">
	<p/>
	<input type="submit" value="Cadastrar">
	<input type="reset" value="Limpar">
</form>		

</body>
</html>
