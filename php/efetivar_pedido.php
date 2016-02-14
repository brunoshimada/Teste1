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
		<h1>PEDIDO <small>C.R.U.D</small></h1>
	</header>
	<div id = "main" class="container">
		<div id = "content" class="container">
		<h3>Confirmação de pedido </h3>

		<?php
		
			$id_prod = $_POST['id_produto'];
			$cpf_cliente = $_POST['cpf_cliente'];

			$dbc = mysqli_connect('localhost','root','admin','teste') or
			die ('Erro conecting');

			
			$query = "INSERT INTO pedido (id_cliente,id_produto) VALUES ('$cpf_cliente','$id_prod')";

			$result = mysqli_query($dbc,$query) or
			die ('Error in the query');

			$query_prod = "SELECT * FROM produto WHERE id = '$id_prod'";
			$result_prod = mysqli_query($dbc,$query_prod) or
			die ('Error in the query');
			$row_prod = mysqli_fetch_array($result_prod);

			$query_cliente = "SELECT * FROM cliente WHERE id = '$cpf_cliente'";
			$result_cliente = mysqli_query($dbc,$query_cliente) or
			die ('Error in the query');
			$row_cliente = mysqli_fetch_array($result_cliente);

			echo '
			<h4>Dados do cliente</h4>
			<p>CPF: '.$row_cliente['id'].'</p>
			<p>Nome: '.$row_cliente['nome'].'</p>
			<p>Email: '.$row_cliente['email'].'</p>
			<p>Telefone: '.$row_cliente['telefone'].'</p>
			<h4>Dados do produto</h4>
			<p>Nome: '.$row_prod['nome'].'</p>
			<p>Descrição: '.$row_prod['descricao'].'</p>
			<p>Preço: '.$row_prod['preco'].'</p>
			';


			mysqli_close($dbc);
		?>

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