<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>Login</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/signin.css" rel="stylesheet">
</head>
<body>

	<div class="container">
		<br><br><br><br><br>
		<form class="text-center form-signin" role="form" action="login.php" method="POST">
			<img src="../img/logo.jpg">
			<br><br>
			<input type="email" class="form-control" name="email" placeholder="Email" required autocomplete="off" autofocus>
			<input type="password" class="form-control" name="password" placeholder="Password" required>
			<button class="btn btn-azul btn-lg btn-primary btn-block" type="submit">Entrar</button>
		</form>
	</div>

</body>
</html>
