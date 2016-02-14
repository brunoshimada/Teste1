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
		<h3>Confirmação de cadastro</h3>
		<?php
		
			$cliente_cpf = $_POST['cpf_cliente'];
			$cliente_nome = $_POST['nome_cliente'];
			$cliente_email = $_POST['email_cliente'];
			$cliente_telefone = $_POST['telefone_cliente'];

			$dbc = mysqli_connect('localhost','root','admin','teste') or
			die ('Erro conecting');

			if (($cliente_email == null)&&($cliente_telefone == null)) {
				//insert com email e telefone null
				$query = "INSERT INTO cliente (id,nome) VALUES ('$cliente_cpf','$cliente_nome')";
				echo "<p>CPF: $cliente_cpf</p>";
				echo "<p>Nome: $cliente_nome</p>";
			}
			else if ($cliente_email == null) {
				//insert com email null
				$query = "INSERT INTO cliente (id,nome,telefone) VALUES ('$cliente_cpf','$cliente_nome','$cliente_telefone')";
				echo "<p>CPF: $cliente_cpf</p>";
				echo "<p>Nome: $cliente_nome</p>";
				echo "<p>Telefone: $cliente_telefone</p>";

			}
			else if ($cliente_telefone == null) {
				//insert com telefone null
				$query = "INSERT INTO cliente (id,nome,email) VALUES ('$cliente_cpf','$cliente_nome','$cliente_email')";
				echo "<p>CPF: $cliente_cpf</p>";
				echo "<p>Nome: $cliente_nome</p>";
				echo "<p>Email: $cliente_email</p>";
			}
			else {
				//insert normal
				$query = "INSERT INTO cliente (id,nome,email,telefone) VALUES ('$cliente_cpf','$cliente_nome','$cliente_email','$cliente_telefone')";
				echo "<p>CPF: $cliente_cpf</p>";
				echo "<p>Nome: $cliente_nome</p>";
				echo "<p>Email: $cliente_email</p>";
				echo "<p>Telefone: $cliente_telefone</p>";
			}

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