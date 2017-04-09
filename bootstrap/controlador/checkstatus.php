<?php
require("conexion.php");

try
    { 

        $stmt = $conn->prepare("SELECT * FROM revision");
        $stmt->execute();
        while ($fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            
            print_r($fila[2]."?".$fila[3].";");
            
        }   
        echo "ok";
    }catch(PDOException $e){
        echo $e->getMessage();
        print_r($e->getMessage());
    }
?>