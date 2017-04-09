<?php 
    require("../controlador/conexion.php");
    try {
        $stmt = $conn->prepare("SELECT * FROM gifs", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        echo '<div class="bxslider" style="text-align:-webkit-center;">';
        while ($fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
          echo "<div><img src='".str_replace("../","",$fila[2])."' alt=''/></div>";
        }
        echo '</div>';
    } catch (PDOException $e) {
        echo $e->getMessage();
      }
    
    ?>
<link href="css/jquery.bxslider.css" rel="stylesheet" />
<script src="js/jquery.bxslider.js"></script>
<script>
   
        $('.bxslider').bxSlider({
            slideMargin: 100,
            adaptiveHeight: true,
            mode: 'fade'
        });
    console.log("hey");
</script>