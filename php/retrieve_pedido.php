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
		<h1>PEDIDO <small>C.R.U.D</small></h1>
	</header>
	<div id = "main" class="container">
		<div id = "content" class="container">
		<?php
		
			$cpf_cliente = $_POST['cpf_retrieve_pedido'];

			echo '<h3>Busca por pedidos de: '.$cpf_cliente.' </h3>';

			$dbc = mysqli_connect('localhost','root','admin','teste') or
			die ('Erro conecting');

		if ($cpf_cliente == null) {
			echo '<p>Listando todos os pedidos</p>';
			$query = "SELECT p.id AS pid,p.nome AS pnome,p.descricao,p.preco,c.id AS cpf,c.nome AS cnome,c.email,c.telefone
     FROM produto AS p, cliente AS c, pedido AS ped
     WHERE ped.id_cliente = c.id
     AND ped.id_produto = p.id";

			$result = mysqli_query($dbc,$query) or
			die ('Error in the query');

			while ($row = mysqli_fetch_array($result)) {
						echo '<ul class = "list-group">';
						echo '<li class = "list-group-item row">'.$row['pid'].' | '.$row['pnome'].' | '.$row['descricao'].' | '.$row['preco'].
						' | '.$row['cpf'].' | '.$row['cnome'].' | '.$row['email'].' | '.$row['telefone'].'
						<form method = "post" action = "delete_pedido.php">
							<input type = "hidden" id = "pid" name = "pid" value = "'.$row['pid'].'"></input>
							<input type = "hidden" id = "cpf" name = "cpf" value = "'.$row['cpf'].'"></input>
							<button type = "submit" class="btn btn-danger btn-sm pull-right">Apagar</button>
						</form>
						</li>';
						echo '</ul>';
			}
		} else {
				$query = "SELECT p.id AS pid,p.nome AS pnome,p.descricao,p.preco,c.id AS cpf,c.nome AS cnome,c.email,c.telefone
     FROM produto AS p, cliente AS c, pedido AS ped
     WHERE ped.id_cliente LIKE '%$cpf_cliente%'
     AND ped.id_cliente = c.id
     AND ped.id_produto = p.id";

				$result = mysqli_query($dbc,$query) or
				die ('Error in the query');

				$result_copy = mysqli_query($dbc,$query) or
				die ('Error in the query');

				if (($row_copy = mysqli_fetch_array($result_copy))==null) {
					echo '<h3>Nothing found!</h3>';
				}

				while ($row = mysqli_fetch_array($result)) {
						echo '<ul class = "list-group">';
						echo '<li class = "list-group-item row">'.$row['pid'].' | '.$row['pnome'].' | '.$row['descricao'].' | '.$row['preco'].
						' | '.$row['cpf'].' | '.$row['cnome'].' | '.$row['email'].' | '.$row['telefone'].'
						<form method = "post" action = "delete_pedido.php">
							<input type = "hidden" id = "pid" name = "pid" value = "'.$row['pid'].'"></input>
							<input type = "hidden" id = "cpf" name = "cpf" value = "'.$row['cpf'].'"></input>
							<button type = "submit" class="btn btn-danger btn-sm pull-right">Apagar</button>
						</form>
						</li>';
						echo '</ul>';
					}

			}


			mysqli_close($dbc);
		?>
		<p>
				<a href="../pedido.html" target="_self">
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