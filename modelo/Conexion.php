<?php
class Conexion{
    private $servidor = "localhost";
    private $db = "farmacia";
    private $puerto = 3310;
    private $charset="utf8";
    private $usuario="root";
    private $contrasena="";
    public $pdo = null;
    private $atributos=[PDO::ATTR_CASE=>PDO::CASE_LOWER,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_ORACLE_NULLS=>PDO::NULL_EMPTY_STRING,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ];
    function __construct(){
        $this->pdo= new PDO("mysql:dbname={$this->db};host={$this->servidor};port={$this->puerto};charset={$this->charset}",$this->usuario,$this->contrasena,$this->atributos);
    }
}
?>


<!--/*TODO LO SIGUIENTE SON LOS ATRIBUTOS QUE VA A TENER EL PDO */
/*PDO::ATT_CASE: CAPITALIZACION ESPECIFICA */
/*PDO::CASE_OWER: RETORNO DE MINUSCULAS PARA MEJOR MANEJO */
/*PDO::ATTR_ERRMODE: REPORTA ERRORES */
/*PDO::ERRMODE_EXCEPTION: LANZA EXCEPCIONES MEDIANTE TRY CATCH */
/*PDO::TETCH_OBJ: RETORNA LAS COSAS COMO OBJETOS */
/*PDO::ATTR_ORACLE_NULLS */
/*PDO::NULL_EMPTY_STRING: LAS CADENAS VACIAS SON CONVERTIDAS A NULL */
/*PDO::ATTR_DEFAULT_FETCH_MODE: ES EL MODO DE BUSQUEDA SE VA UTILIZAR PDO::FETCH_OBJ - PORQUE COMO ES ORIENTADA A OBJETOS, ES DECIR QUE CADA VEZ QUE SE HAGAN CONSULTAS SE RETORNAN OBJETOS */-->
