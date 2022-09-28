<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="stylesheet" type="text/css" href="../views/helpers/estilos.css">
    <script src="../views/helpers/funcoescrud.js" type="text/javascript"></script>

</head>
<body>
<?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
    <h1>Usuários</h1>
    <ul>
        <?php foreach($data['usuarios'] as $user): ?>

            <li>
                <?= $user['id'] ?> - 
                <?= $user['nome'] ?> - 
                <?= $user['email'] ?> - 
                <?= $user['senha'] ?> - 
                <?= $user['username'] ?> -
                <?= $user['dtNascimento'] ?> -
                <?= $user['tipoUser'] ?> -
                [ <a href="./UserController.php?action=edit&id=<?= $user['id'] ?>">Editar</a> ] 
                [ <a href="javascript:confirmarExclusaoUser('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a> ]
            </li>             
        <?php endforeach; ?>
    </ul>

    <p>
    [ <a href="./UserController.php?action=loadFormNew">Cadastrar novo</a> ]
    
</body>
</html>
