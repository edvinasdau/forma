<?php

define('SERVER', "localhost");
define('USER', "root");
define('PASS', "");
define('DATABASE', "students");
if (isset($_POST['name']) && $_POST['name'] !=null) {	
	try {

		$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$statement = $conn->prepare("INSERT INTO users (name, surname, email, phone) VALUES (:name,:surname,:email,:phone)");
		$statement->bindParam(":name", $_POST['name']); //bind pririsa
		$statement->bindParam(":surname", $_POST['surname']);
		$statement->bindParam(":email", $_POST['email']);
		$statement->bindParam(":phone", $_POST['phone']);
		$statement->execute();
		$conn = null;
		echo '<div class="alert alert-success" role="alert">User added</div>';

	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
} else {
	echo '<div class="alert alert-danger" role="alert">No data</div>';
}
