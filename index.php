<?php


define('SERVER', "localhost");
define('USER', "root");
define('PASS', "");
define('DATABASE', "students");

if (isset($_POST['name']) && $_POST['name'] != null) {	

	try {

		$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$conn->query("INSERT INTO users (name, surname, email, phone) VALUES ('". $_POST['name'] ."','". $_POST['surname'] ."','". $_POST['email'] ."','". $_POST['phone'] ."')"); - nesaugu !!!

		$statement = $conn->prepare("INSERT INTO users (name, surname, email, phone) VALUES (:name,:surname,:email,:phone)");

		//1 variantas
		$statement->bindParam(":name", $_POST['name']); //bind pririsa
		$statement->bindParam(":surname", $_POST['surname']);
		$statement->bindParam(":email", $_POST['email']);
		$statement->bindParam(":phone", $_POST['phone']);
		$statement->execute();
		//2variantas
		//$statement->execute($_POST);
		$conn = null;

	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
	try {

	$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$statement = $conn->query("SELECT * FROM users");
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);

	$conn = null;

	} 
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	

?>

<!DOCTYPE html>
<html>
<head>

	<title>Errors</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row"><h1>Users</h1>
		</div>
		<div class="row">
			<div class="col"><h2>List</h2>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Surname</th>
							<th>Email</th>
							<th>Phone</th>
						</tr>

					</thead>
					<tbody id="user_table_body">
						<?php
							foreach ($users as $user) {
								echo "<tr>
										<td>" . $user['id'] . "</td>
										<td>". $user['name'] . "</td>
										<td>". $user['surname'] . "</td>
										<td>" . $user['email']. "</td>
										<td>" . $user['phone'] . "</td>
									</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
			<div class="col">
				<h2>Register</h2>
				<div id="alert"></div>
				<form method="POST">
					<div class="input-group">
						<input class="form-control" type="text" name="name" placeholder="Name" id="form_name">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="surname"	placeholder="Surname" id="form_surname">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="email" placeholder="Email" id="form_email">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="phone" placeholder="Phone" id="form_phone">
					</div><br/>
					<div class="input-group">
						<input class="btn btn-dark" type="submit" name="Irasyti" value="submit">
					</div>
					<div>
						<input onclick="add()" class="btn btn-danger" type="button" value="Add">
					</div>
					<div>
						<input id="ajax_post" class="btn btn-warning" type="button" value="AJAX post">
					</div>
				</form>	
			</div>
		</div>
	</div>
<script src="add.js"></script>
</body>
</html>