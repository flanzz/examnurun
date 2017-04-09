<?php
require("conexion.php");
$ruta = $_POST['ruta'];
try
    { 

        $stmt = $conn->prepare("UPDATE revision SET valor=0 WHERE rutagif=:ruta");
        $stmt->execute(array(":ruta"=>$ruta));
        
        echo "ok";
    }catch(PDOException $e){
        echo $e->getMessage();
        print_r($e->getMessage());
    }
?>