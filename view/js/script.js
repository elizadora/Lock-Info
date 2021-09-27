$(".table tbody").on('click','#editar',function () {
	//pegando da tabela os valores
	var row = $(this).closest('tr');
	var id = row.find('th:eq(0)').text();
	var nome = row.find('td:eq(0)').text();
	var cpf = row.find('td:eq(1)').text();
	$("#cpf").val(cpf);
	$("#nome").val(nome);
	$("#id").val(id);
	//habilitando os campos

	$('#cpf').prop( "disabled", false);
	$('#nome').prop( "disabled", false);
	$("#alteracao").prop("disabled",false);

});
$(document).ready(function() {
    $("#message").toast("show");
  });
$("#cpf").mask("000.000.000-00");