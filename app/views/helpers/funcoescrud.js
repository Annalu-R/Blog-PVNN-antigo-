
function confirmarExclusaoCliente(nome, id) {
     var resposta = confirm("Deseja remover o registro '" + nome + "' ?");
 
     if (resposta) {
	    window.location.href = "ClienteController.php?action=deleteClienteById&id=" + id;
     }
}
