<?php 	include('parts/header.php') ?>
	<div class="row center-xs middle-xs center">
		<div class="col-xs-12 col-sm-5">
			<a class="link" href="clientes.php">
				<div class="white-box">
					<span class="material-icons icon-big">assignment_ind</span><br/>
					<span class="linkers">Clientes <span>
						<?php
								$curl = curl_init( $address."consultarClientes" );
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
								$result = json_decode(curl_exec($curl),true);
								echo "(".count($result).")";
						?>
					</span></span>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-5">
			<a class="link" href="categorias.php">
				<div class="white-box">
					<span class="material-icons icon-big">list</span><br/>
					<span class="linkers">Categorias <span>
						<?php
								$curl = curl_init( $address."consultarCategorias" );
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
								$result = json_decode(curl_exec($curl),true);
								echo "(".count($result).")";
						?>
					</span></span>
				</div>
			</a>
		</div>
	</div>
<?php 	include('parts/footer.php') ?>