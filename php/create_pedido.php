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
		<h3>Dados do produto </h3>

		<?php
		
			$id_prod = $_GET['id'];

			$dbc = mysqli_connect('localhost','root','admin','teste') or
			die ('Erro conecting');

			
			$query = "SELECT * FROM produto WHERE id = '$id_prod'";

			$result = mysqli_query($dbc,$query) or
			die ('Error in the query');

			while ($row = mysqli_fetch_array($result)) {
				echo '<ul class = "list-group">';
				echo '<li class = "list-group-item">'.$row['id'].' | '.$row['nome'].' | '.$row['descricao'].' | '.$row['preco'].'
						</li>';
						echo '</ul>';
					}


			mysqli_close($dbc);
		?>

		<div id = "create" class ="form-group">
			<h3>Cadastrar pedido</h3>
			<form method="post" action="efetivar_pedido.php">
				<?php

					$id_produto = $_GET['id'];
					echo '
					<input type="hidden" id="id_produto" name = "id_produto" value ="'
					.$id_produto.'"></input>
					';
					
				?>
				<p>
					<label for = "cpf_cliente">CPF do cliente:</label>
					<input type="text" id="cpf_cliente" name = "cpf_cliente" class="form-control" placeholder="Sem pontos e traços"></input>
				</p>
				<p><button type = "submit" class="btn btn-default">Cadastrar</button></p>
			</form>
		</div>	
		<p>
				<a href="../produto.html" target="_self">
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