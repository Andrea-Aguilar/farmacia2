<?php
include_once 'Conexion.php';/* aqui incluimos la conexion */
/*Creacion de la clase */
class Usuario{
    /*variable denominada objetos */
    var $objetos;
    /*declaracion de la funcion constructor*/
    public function __construct(){
        /*nueva conexion PDO */
        $db = new Conexion();
        /*Asignacion de acceso al this, con una variable del propio modelo. Agregando conexion pasandole el pdo*/
        $this->acceso = $db->pdo;/*con esto ya se esta haciendo la conexion pdo cada que ingresamos un usuario*/
    }
    /*Creacion de metodos */ 
    /*Metodo loguearse */  
    function Loguearse($dni,$pass){/*lo que esta $dni,$pass es lo que va ir dentro del array de la linea 23 despues de ':dni'=> */
        /*Creacion consulta sql */
        $sql="SELECT * FROM usuario inner join tipo_usuario on us_tipo=id_tipo_usuario where dni_us=:dni and contrasena_us=:pass";
    
        /*Declaracion de query, obteniendo acceso al pdo, pasando de esta forma el sql que se hizo arriba */
        $query = $this->acceso->prepare($sql);
        /*Aqui le estoy pasando al query un execute y el array con las variables del dni y pass */
        $query->execute(array(':dni'=>$dni,':pass'=>$pass));
        /*retorno al this los objetos, asignando query y ademas se hace una busqueda de todo con el fetchall*/
        $this->objetos=$query->fetchall();
        /*Retorno de un objeto */
        return $this->objetos;
    }
    }
?>