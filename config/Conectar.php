<?php
namespace config;
use mysqli;

class Conectar
{
    /**
     * @access private
     * @var string
     */
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        
        /**
         * Establece los datos principales a la base de adtos
         *
         * Este metodo solo el nombre y el tipo de conexion a la
         * base de datos, configurando: host, nombre de la base de
         * datos entre otras configuraciones.
         *
         * @access public
         * @param string 
         * @return Conexion base de datos
         */
        
        $db_cfg =  array(
            "driver"    =>"mysql",
            "host"      =>"localhost",
            "user"      =>"root",
            "pass"      =>"",
            "database"  =>"cursos_online",
            "charset"   =>"utf8"
        );

        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];

    }
    
    public function conexion(){
        /**
         * Establece la conexion de la base de datos
         *
         * Este metodo hace un llamada la base de datos mediante 
         * la instanciacion de mysqli;
         *
         * @access public
         * @param string 
         * @return Conexion base de datos
         */

        if($this->driver=="mysql" || $this->driver==null){

            $con=new mysqli($this->host, $this->user, $this->pass, $this->database);
            $con->query("SET NAMES '".$this->charset."'");
        }
        
        return $con;
    }
    
}
?>
