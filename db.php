<?php

include_once 'sql.php';
$database = new Database();
$db = $database->getConnection();
/*define('DB_TYPE', 'mysql');
define('DB_HOST', '****');
define('DB_PORT', 3306);
define('DB_NAME', '****');
define('DB_USERNAME', '****');
define('DB_PASSWORD', '****');

$dsn = DB_TYPE . ':dbname=' . DB_NAME . ';host=' . DB_HOST . ';port=' . DB_PORT;

try {
	$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
	echo $e->getMessage();
	print_r($e->getTrace());
}*/
?>
