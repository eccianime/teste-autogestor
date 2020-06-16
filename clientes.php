<?php 	include('parts/header.php') ?>
	<div class="row center-xs middle-xs">
		<div class="col-xs-12 col-sm-9">
			<div class="white-box">
				<a class="link title link-back" href="index.php">
					<span class="material-icons">arrow_back</span>
					Voltar
				</a>
				<span>
					<span class="material-icons icon-mid">assignment_ind</span>
					<span class="title">Clientes</span>
				</span>
				<input class="search-input" type="text" onkeyup="buscarCliente()" name="termino" placeholder="Procurar">
				<div>
					<table>
						<thead>
							<tr class="table-head">
								<td>Nome</td>
								<td>Categoria</td>
								<td>Ação</td>
							</tr>
						</thead>
						<tbody id="table-clients">
							<?php

								$curl = curl_init( $address."consultarClientes" );
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
								$result = json_decode(curl_exec($curl),true);
								if( count($result) > 0 ){
									foreach ($result as $key => $value) {
										echo "<tr>
												<td data-nome-id=".$value['id']."><span>".$value['nome']."</span> <span>".$value['sobrenome']."</span></td>
												<td>".($value['categoria'] == null ? "==CATEGORIA APAGADA==" : $value['categoria'])."</td>
												<td><a href=# class='button-edit' onclick=colocarParaEditarCliente(".$value['id'].",".$value['id_categoria'].")>
													<span class='material-icons'>create</span></a>
													<a href=# class='button-erase' onclick='apagarCliente(".$value['id'].")'>
													<span class='material-icons'>delete_forever</span></a></td>
											</tr>";
									}
								}else{
									echo "<tr><td colspan=3>Não tem dados nos momentos</td></tr>";
								}
							?>
						</tbody>
					</table>
					<div class="panel-add row center-xs">
						<div class="col-xs-12"><span class="title">Adicionar / Modificar</span></div>
						<input type="hidden" name="id">
						<div class="col-xs-12 col-sm-4"><input onkeyup="limpiarValidador()" type="text" name="nome" placeholder="Nome"><small name=validaNomeCliente></small></div>
						<div class="col-xs-12 col-sm-4"><input onkeyup="limpiarValidador()" type="text" name="sobrenome" placeholder="Sobrenome"><small name=validaSobrenomeCliente></small></div>
						<div class="col-xs-12 col-sm-4">
							<select name="combo_categoria" onselect="limpiarValidador()">
								<option value="0">Selecione Categoria...</option>
								<?php

									$curl = curl_init( $address."consultarCategorias" );
									curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
									$result = json_decode(curl_exec($curl),true);

									if( count($result) > 0 ){
										foreach ($result as $key => $value) {
											echo "<option value=".$value['id'].">".$value['categoria']."</option>";
										}
									}
								?>
							</select>
							<small name=validaCategoriaCliente></small>
						</div>
						<div class="col-xs-12 col-sm-4">
							<a href="#" onclick="guardarCliente()">Guardar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
<?php 	include('parts/footer.php') ?>