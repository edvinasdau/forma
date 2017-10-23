<?php 

header("Content-type:application/json");

define('SERVER', "localhost");
define('USER', "root");
define('PASS', "");
define('DATABASE', "students");

try {

	$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$statement = $conn->prepare("SELECT * FROM users");
	$statement->execute();
	
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);

	$conn = null;

	} 
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

echo json_encode($users);