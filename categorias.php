<?php 	include('parts/header.php') ?>
	<div class="row center-xs middle-xs">
		<div class="col-xs-12 col-sm-9">
			<div class="white-box">
				<a class="link title link-back" href="index.php">
					<span class="material-icons">arrow_back</span>
					Voltar
				</a>
				<span>
					<span class="material-icons icon-mid">list</span>
					<span class="title">Categorias</span></span>
				<div>
					<table>
						<thead>
							<tr class="table-head">
								<td>Categoria</td>
								<td width="200px">Ação</td>
							</tr>
						</thead>
						<tbody id="table-categories">
							<?php

								$curl = curl_init( $address."consultarCategorias" );
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
								$result = json_decode(curl_exec($curl),true);

								if( count($result) > 0 ){
									foreach ($result as $key => $value) {
										$cat = $value['categoria']; 
										$id = $value['id'];
										echo "<tr><td data-id=$id>$cat</td>
												<td><a href=# class=button-edit onclick=colocarParaEditarCategoria($id)>
													<span class=material-icons>create</span></a>
													<a href=# class=button-erase onclick=apagarCategoria($id)>
													<span class=material-icons>delete_forever</span></a>
												</td></tr>";
									}
								}else{
									echo "<tr><td colspan=3>Não tem dados nos momentos</td></tr>";
								}
							?>
						</tbody>
					</table>
					<div class="panel-add row center-xs">
						<div class="col-xs-12"><span class="title">Adicionar/Modificar</span></div>
						<div class="col-xs-12 col-sm-4"><input type="text" name="categoria" onkeyup="limpiarValidador()" placeholder="categoria">
							<small name=validaCategoria></small></div>
						<input type="hidden" name="id">
						<div class="col-xs-12 col-sm-4">
							<a href="#" onclick="guardarCategoria()">Guardar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
<?php 	include('parts/footer.php') ?>