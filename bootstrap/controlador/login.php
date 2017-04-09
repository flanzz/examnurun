<?php
    require_once 'conexion.php';

     
    $user_email = trim($_POST['correo']);
    $user_password = trim($_POST['pass']);
    $password = md5($user_password);

    try
    { 

        $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(array(":email"=>$user_email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if($count > 0){
                
           if($row['contrasena']==$password){
       session_start();
            echo "ok"; // log in
            $_SESSION['user_name'] = $row['nombre'];
            $_SESSION['user_pass'] = $user_password;
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id']=$row['iduser'];
           }
           else{
            echo "Correo o contraseña incorrect@."; // wrong details 
           }
        }else{
           echo "error";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }


?>