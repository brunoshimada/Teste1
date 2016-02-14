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
	<header id = "header" class = "page-header">
		<h1>CLIENTE <small>C.R.U.D</small></h1>
	</header>
	<div id = "main" class="container">
		<div id = "content" class="container">
		<?php
		
			$cliente_cpf = $_POST['cpf_retrieve_cliente'];

			echo '<h3>Busca por: '.$cliente_cpf.' </h3>';

			$dbc = mysqli_connect('localhost','root','admin','teste') or
			die ('Erro conecting');

		if ($cliente_cpf == null) {
			echo '<p>Listando todos os clientes</p>';
			$query = "SELECT * FROM cliente";			

			$result = mysqli_query($dbc,$query) or
			die ('Error in the query');

			while ($row = mysqli_fetch_array($result)) {
				echo '<ul class = "list-group">';
				echo '<li class = "list-group-item row">'.$row['id'].' | '.$row['nome'].' | '.$row['email'].' | '.$row['telefone'].
				'<form method = "post" action = "delete_cliente.php">
					<input type = "hidden" id = "id" name = "id" value = "'.$row['id'].'"></input>
					<button type = "submit" class="btn btn-danger btn-sm pull-right">Apagar</button>
				</form>
				</li>';
				echo '</ul>';
			}
		} else {
				$query = "SELECT * FROM cliente WHERE id LIKE '%$cliente_cpf%'";

				$result = mysqli_query($dbc,$query) or
				die ('Error in the query');

				$result_copy = mysqli_query($dbc,$query) or
				die ('Error in the query');

				if (($row_copy = mysqli_fetch_array($result_copy))==null) {
					echo '<h3>Nothing found!</h3>';
				}

				while ($row = mysqli_fetch_array($result)) {
						echo '<ul class = "list-group">';
						echo '<li class = "list-group-item row">'.$row['id'].' | '.$row['nome'].' | '.$row['email'].' | '.$row['telefone'].
						'<form method = "post" action = "delete_cliente.php">
							<input type = "hidden" id = "id" name = "id" value = "'.$row['id'].'"></input>
							<button type = "submit" class="btn btn-danger btn-sm pull-right">Apagar</button>
						</form>
						</li>';
						echo '</ul>';
					}

			}

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