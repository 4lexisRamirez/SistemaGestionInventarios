<?php
// conexion.php
$host = "EDUARDO\SQLEXPRESS";  
$dbname = "proyecto";    
$username = "sa";        
$password = "sa";        

try {
    $dsn = "sqlsrv:Server=$host;Database=$dbname";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
