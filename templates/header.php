<?php
	include_once('config/url.php');
	include_once('config/process.php');

	//clean the message
	if(isset($_SESSION['msg'])) {
		$printMsg = $_SESSION['msg'];
		$_SESSION['msg'] = '';
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agenda de Contatos - PHP</title>
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap.min.css" integrity="sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!--custom CSS -->
	<link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
	</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="<?= $BASE_URL ?>index.php">
				<img src="<?= $BASE_URL ?>img/fsdev-logo.png" alt="logotipo">
			</a>
			<div>
				<div class="navbar-nav">
					<a class="nav-link" id="home-link" href="<?= $BASE_URL ?>index.php">Agenda</a>
					<a class="nav-link" href="<?= $BASE_URL ?>create.php">Cadastrar</a>
				</div>
			</div>
		</nav>
	</header>