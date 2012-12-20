<?php

//// Configuration

$username = ""; // put here chosen MySQL server username
$password = ""; // put here chosen MySQL server password

$host     = ""; // leave empty for localhost
$port     = ""; // leave empty for 3306


//// Output to the browser

echo "Webserver: " . cli() . "<br>" . PHP_EOL;
echo "PHP: " . checkPhp() . " OK<br>" . PHP_EOL;
echo "MySQL extension: " . checkMysqlExtension() . "<br>" . PHP_EOL;
echo "MySQL connection: " . checkMysqlConnection($host, $port, $username, $password, $database) . "<br>" . PHP_EOL;

//// Checking functions

function cli() {
	return (isset($_SERVER['HTTP_USER_AGENT']) ? "OK" : "Error");
}

function checkPhp() {
	return phpversion();
}

function checkMysqlExtension() {
	if (extension_loaded("mysql")) return "OK";
	else if (extension_loaded("mysqli")) return "OK";
	else if (extension_loaded("pdo_mysql")) return "OK";
	else return "ERROR";
}

function checkMysqlConnection($host = "localhost", $port = 3306, $username, $password, $database) {
	if (!empty($port) && $port != 3306) $host .= ":" . $port;
	$link = @mysql_connect($host, $username, $password);
	if (!is_resource($link)) return "Error";
	else return "OK";
}