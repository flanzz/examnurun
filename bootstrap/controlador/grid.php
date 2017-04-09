<?php
require("conexion.php");
try {
    $stmt = $conn->prepare("SELECT * FROM gifs", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    while ($fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      echo $fila[2]."?";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
  }
?>