<?php 
    require 'conexion.php';
    
    $nombre = $_POST['nombre'];
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];
    $correo = $_POST['correo'];
    $c1 = $_POST['c1'];
    $pass = md5($c1);

     try
    { 
        $stmt = $conn->prepare("INSERT INTO users(nombre, apellido_paterno, apellido_materno, email, usuario, contrasena) VALUES(:nombre, :apellido_p, :apellido_m, :email, :user, :pass)");
        $stmt->execute(array(":nombre"=>$nombre, ":apellido_p"=>$apellidop, ":apellido_m"=>$apellidom, ":email"=>$correo, ":user"=>$nombre,":pass"=>$pass));
        echo "ok";
            
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>