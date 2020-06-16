$(function() {
	$('[name=categoria]').val("");
	$('[type=hidden]').val("");
})
function guardarCategoria() {
	var categoria = $('[name=categoria]').val();
	var id = $('[name=id]').val();
	if( categoria == "" ){
		$("[name=validaCategoria]").html('Não deixe esse campo em branco');
	}else{
		$.ajax({
			type: 'POST',
			url: address+'guardarCategoria',
			data: {
				id: id,
				categoria: categoria
			},
			success: function() {
				location.reload();
			}
		})
	}
}

function apagarCategoria( id ) {
	$.ajax({
		type: 'POST',
		url: address+'apagarCategoria',
		data: {
			id: id
		},
		success: function(rsp) {
			location.reload();
		}
	})
}

function colocarParaEditarCategoria( id ) {
	$('input[type=hidden]').val(id);
	$('input[name=categoria]').val($('[data-id='+id+']').html());
}

function limpiarValidador() {
	$("[name=validaCategoria]").html('');
}