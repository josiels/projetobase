<?php
	require_once("../controllers/UserController.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<h1>Criar novo usu&aacute;rio</h1>
	<form method="POST" action="testeProcessa_form.php">
		<label>Nome:</label>
		<input type="text" name="nome"><br><br>
		<label>E-mail:</label>
		<input type="email" name="email"><br><br>
		<label>Senha:</label>
		<input type="password" name="senha"><br><br>
		<label>Nível</label>
		<select name="level">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select>
		<br /><br />
		<button type="submit">Criar usuário</button>
	</form>
	<hr />
	<?php
	
	echo uniqid();

	?>
</body>
</html>
	