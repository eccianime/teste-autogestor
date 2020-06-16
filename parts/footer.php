<script type="text/javascript" src=js/jquery.min.js></script>
<script type="text/javascript">
	function onBodyLoad() {
		setTimeout(function() {
			$('.overlay').addClass('fade');
			setTimeout( function() {
				$('.overlay').remove();
			}, 500 )
		}, 500)
	}
</script>
<script type="text/javascript" src=js/categorias.js></script>
<script type="text/javascript" src=js/clientes.js></script>
</body>
</html>