<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TESTE 1</title>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap.icon-large.min.css">
    <link rel="stylesheet" href="../css/main.css">

    <script type="text/javascript" src="../scripts/jquery-1.11.2.min.js"></script>
</head>
<body>
	<header id = "header" class="page-header">
		<h1>CLIENTE <small>C.R.U.D</small></h1>
	</header>
	<div id = "main" class="container">
		<div id = "content" class="container">
		<h3>Cliente apagado</h3>

		<?php
		
			$cliente_cpf = $_POST['id'];
			
			$dbc = mysqli_connect('localhost','root','admin','teste') or
			die ('Erro conecting');

			$query = "DELETE FROM cliente WHERE id = $cliente_cpf";

			$result = mysqli_query($dbc,$query) or
			die ('Error in the query');

			mysqli_close($dbc);
		?>
		<p>
			<a href="../cliente.html" target="_self">
				<button class = "btn" type="button">
				Voltar
				</button>
			</a>
		</p>
		</div>
	</div>
	<footer id = "bottom" class  ="footer">
		<div class = "container">
			<p>Feito por Bruno Shimada</p>	
		</div>
	</footer>
</body>
</html>
