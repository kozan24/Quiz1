<?php
 $DATABASE_HOST = 'localhost';
 $DATABASE_USER = 'root';
 $DATABASE_PASS = '';
 $DATABASE_NAME = 'simplecrud';
try {

  $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=simplecrud", $DATABASE_NAME, $DATABASE_PASS, $DATABASE_USER);

  // set the PDO error mode to exception

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Connected successfully";

  }

catch(PDOException $e)

  {

  echo "Connection failed: " . $e->getMessage();

  }

//Mengirimkan Token Keamanan Ajax Request (Csrf Token)
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>