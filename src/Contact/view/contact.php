
<!DOCTYPE html>
<html>
	<head>
		<title>Contacto</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<!-- Framework Jquery-->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script src="https://use.fontawesome.com/eaf3553229.js"></script>
	</head>
	<body>
		<form method="post" id="ajaxform">
			<h3>Contacto</h3>
			<input type="text" id="nombre" name="nombre" placeholder="Nombre">
			<input type="email" id="email" name="email" placeholder="Email"><br>
			<textarea type="text" id="mensaje" name="mensaje" placeholder="Escribe aqui" rows="7" cols="30"></textarea>
			<input type="button" id="btn" value="Enviar su mensaje">
			<!--Caja de mensajes de validación y respuesta del server -->
			<div id="data"></div>
		</form>
	</body>
</html>

