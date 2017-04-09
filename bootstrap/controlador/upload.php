<?php 
require("conexion.php");
//print_r($_FILES);
$fileName = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$fileSize = $_FILES['file']['size'];
$fileContent = file_get_contents($_FILES['file']['tmp_name']);
if($fileType != "image/gif" ) {
    echo "Tipo de archivo no aceptado.";
}
else{
   if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
   
     try
    { 
        session_start();
        $id=$_SESSION['user_id'];
        $ruta='../gifs/' .$id.date('y-m-d').$fileName;
        $rutas=str_replace(" ","",$ruta);
        print_r($rutas);
        $stmt = $conn->prepare("INSERT INTO gifs(iduser, ruta, fecha) VALUES(:iduser, :ruta, :fecha)");
        $stmt->execute(array(":iduser"=>$id, ":ruta"=>$rutas, ":fecha"=>date('y-m-d') ));
        $stmt = $conn->prepare("INSERT INTO revision(iduser, rutagif, valor) VALUES(:iduser, :ruta, :accept)");
        $stmt->execute(array(":iduser"=>$id, ":ruta"=>$rutas, ":accept"=>1));
        echo "Ok ";
            
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    move_uploaded_file($_FILES['file']['tmp_name'], $rutas);
    
    echo "Archivo subido";
} 
}


?>