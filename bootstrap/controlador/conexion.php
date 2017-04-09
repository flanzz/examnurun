<?php
$servername = "mysql.hostinger.mx";
$username = "u775728584_flanz";
$password = "OnaAysFI2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=u775728584_exam", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>