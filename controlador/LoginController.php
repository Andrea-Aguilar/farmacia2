<?php
/*Aqui estoy haciendo un include de modelo*/
include_once '../modelo/Usuario.php';
session_start();
$user = $_POST['user'];/*Es la misma que coloque en el login.php */
$pass = $_POST['pass'];/*Es la misma que coloque en el login.php */
/*Declaracion de un usuario e instancion de modelo usuario, con la instancion se esta haciendo la conexion al pdo */
$usuario = new Usuario();
 /*if para enrutamiento siempre que haya una sesion*/
/*lo que esta en parentesis despues de empty quiere decir que si us_tipo esta vacia, si no esta vacia tiene que dar verdadera */
 if (!empty($_SESSION['us_tipo'])){
/*session_destroy();*/
     /*si hay una sesion en curso */
     switch ($_SESSION['us_tipo']) {
        /*Caso 1 es Administrador */ 
        case 1:
            /*Este caso redireccionara a la pagina de adm_catalogo.php */
            header('Location: ../vista/adm_catalogo.php');
            break;
        /*Caso e es Tecnico */
        case 2:
            /*Este caso redireccionara a la pagina de adm_catalogo.php */
            header('Location: ../vista/tec_catalogo.php');
            break;
    }
 }
 /*si no se hara lo que esta dentro del else, que es el if*/
 else {
     /*Cree lo de abajo para usar el metodo loguearse */
       $usuario->Loguearse($user,$pass);
/*Control de acceso y redireccionamiento de errores */
/*Realizacion de un if, verificara si un usuario coincide con la base de datos */
/*Este if va a verificar que rol tiene ese usuario, y de esta forma nos va a redireccionar a una pagina
o una vista*/
/*En el empty verifica que una variable no este vacia, si es verdadero hace efecto el if*/
if(!empty($usuario->objetos)){
    /*Si la variable esta vacia entra el siguiente foreach */
    /*Creacion de foreach para retorno de objetos */
    foreach($usuario->objetos as $objeto){
        /*lo que retorna con el print_r, este print se puede usar: /*print_r($objeto->id_usuario);*/
        /*Variables globales de sesion */
        $_SESSION['usuario']=$objeto->id_usuario;/*Aqui se asigna objeto que tenga usuario */
        $_SESSION['us_tipo']=$objeto->us_tipo;
        $_SESSION['nombre_us']=$objeto->nombre_us;
    }
    /*Realizacion de switch */
    /*Verificacion de usuario que a iniciado sesion */
    switch ($_SESSION['us_tipo']) {
        /*Caso 1 es Administrador */
        case 1:
            /*Este caso redireccionara a la pagina de adm_catalogo.php */
            header('Location: ../vista/adm_catalogo.php');
            break;
        /*Caso e es Tecnico */
        case 2:
            /*Este caso redireccionara a la pagina de adm_catalogo.php */
            header('Location: ../vista/tec_catalogo.php');
            break;
    }
}
/*Este else me sirve si no existe usuario en la base de datos, me va a redireccionar
al login */
else {
    header('Location: ../vista/login.php');
}     
}
?>