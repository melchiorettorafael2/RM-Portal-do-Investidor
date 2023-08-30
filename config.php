<?php
session_start();
/* DATABASE CONFIGURATION */
define('DB_SERVER', 'mysql.klausinvest.com');
define('DB_USERNAME', 'klausinvest');
define('DB_PASSWORD', 'nick70KL@US');
define('DB_DATABASE', 'klausinvest');
define("BASE_URL", "https://www.klausinvest.com/"); 

function getDB() 
{
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	try {
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbConnection->exec("set names utf8");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}

}
?>