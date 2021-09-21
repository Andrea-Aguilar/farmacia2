<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href = "https: //fonts.googleapis.com/css2? family = Poppins: wght @ 700 & display = swap "rel =" stylesheet ">
 <link rel="stylesheet" type="text/css" href="../css/style.css">
 <link rel="stylesheet" type="text/css" href="../css/css/all.min.css">
 <link rel="shortcut icon" href="../img/logo.png"> 
</head>
<!--Codigo para que me regrese a la pagina de tecnico o administrador y no al login-->
<!--Session start permite usar las variables de sesiones-->
<!--if indicando si se esta en una sesion, si lo esta mandara a la pagin de tecnico o adminsitrador-->
<?php
session_start();
if(!empty($_SESSION['us_tipo'])){
    /*Aqui indicamos que si hay una sesion debe de irse a LoginController.php para que le de instrucciones */
    header('Location: ../controlador/LoginController.php');
}
/*Aqui indicamos con este else que si no hay sesion iniciada debe de dirigirse al login */
else {
    /*Si en caso no hay ninguna sesion borrarlas todas las que esten en curso */
    session_destroy();
?>
<body>
    <img class="wave" src="../img/wave.png" alt="">
        <div class="contenedor">
            <div class="img">
                <img src="../img/bg.png" alt="">
            </div>
            <div class="contenido-login">
                <form action="../controlador/LoginController.php" method="POST">
                    <img src="../img/logo.png" alt="">
                    <h2>Farmacia</h2>
                        <div class="input-div dni">
                            <div class="i">
                                <i class="fas fa-user">
                                </i>
                            </div>
                            <div class="div">
                                <h5>Usuario</h5>
                                <input type="text" name="user" class="input">
                            </div>
                        </div>
                        <div class="input-div pass">
                            <div class="i">
                                <i class="fas fa-lock">

                                </i>
                            </div>
                            <div class="div">
                                <h5>Contraseña</h5>
                                <input type="password" name="pass" class="input">
                            </div>
                        </div>
                        <a href="">Created Warpiece</a>
                        <input type="submit" class="btn" value="iniciar sesion">
                </form>
            </div>
        </div>
</body>
<script src="../js/login.js">
</script>
</html>
<?php
}
?><!--Aqui finaliza el else-->