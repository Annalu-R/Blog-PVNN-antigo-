
function confirmarExclusaoUser(nome, id) {
     var resposta = confirm("Deseja remover o registro '" + nome + "' ?");
 
     if (resposta) {
	    window.location.href = "UserController.php?action=deleteUserById&id=" + id;
     }
}
