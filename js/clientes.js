$(function() {
	$('[type=hidden]').val("");	
	$('[name=nome]').val("");
	$('[name=sobrenome]').val("");
	$('[name=combo_categoria]').val("0");	
	$('[name=termino]').val("");	
})
function guardarCliente() {
	var id = $('[name=id]').val();
	var nome = $('[name=nome]').val();
	var sobrenome = $('[name=sobrenome]').val();
	var categoria = $('[name=combo_categoria] option:selected').attr('value');

	if( nome == "" ){
		$("[name=validaNomeCliente]").html('Não deixe esse campo em branco');
	}else if( sobrenome == "" ){
		$("[name=validaSobrenomeCliente]").html('Não deixe esse campo em branco');
	}else if( categoria == "0" ){
		$("[name=validaCategoriaCliente]").html('Não deixe esse campo em branco');
	}else{
		$.ajax({
			type: 'POST',
			url: address+'guardarCliente',
			data: { 
				id: id,
				nome: nome,
				sobrenome: sobrenome,
				id_categoria: categoria
			},
			success: function( rsp ) {
				location.reload();
			}
		})
	}
}

function apagarCliente( id ) {
	$.ajax({
		type: 'POST',
		url: address+'apagarCliente',
		data: {
			id: id
		},
		success: function(rsp) {
			location.reload();
		}
	})
}

function colocarParaEditarCliente( id, categoria ) {
	$('[type=hidden]').val(id);
	$('[name=nome]').val( $("[data-nome-id="+id+"] span:nth-child(1)").html() );
	$('[name=sobrenome]').val( $("[data-nome-id="+id+"] span:nth-child(2)").html() );
	$('[name=combo_categoria]').val(categoria);
}

function limpiarValidador() {
	$("[name=validaNomeCliente]").html('');
	$("[name=validaSobrenomeCliente]").html('');
	$("[name=validaCategoriaCliente]").select('');
}

function buscarCliente() {
	var termino = $('[name=termino]').val();

	$.ajax({
		type: 'POST',
		url: address+'buscarCliente',
		data: {
			termino:termino,
		},
		success: function(rsp) {
			var result = JSON.parse(rsp),
				html = "";
			if( result.length > 0 ){
				result.map( (value)=>{
					html += `<tr><td data-nome-id=${value['id']}><span>${value['nome']}</span> <span>${value['sobrenome']}</span></td>
									<td>${value['categoria']}</td>
									<td><a href=# class='button-edit' onclick=colocarParaEditarCliente(${value['id']},${value['id_categoria']})>
										<span class='material-icons'>create</span></a>
										<a href=# class='button-erase' onclick='apagarCliente(${value['id']})'>
										<span class='material-icons'>delete_forever</span></a></td>
									</tr>`;
				})	
			}else{
				html += `<tr><td colspan=3>No tem registros nos momentos</td></tr>`;

			}

			$('#table-clients').empty().html(html)
		}
	})	
}