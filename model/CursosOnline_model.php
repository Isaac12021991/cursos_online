<?php
namespace model;

use config\Conectar;

spl_autoload_register(function($clase){
    require_once str_replace('\\', '/', $clase).'.php';
});

/**
* Esquema del model (interface CRUD_interface)
*
* lectura y validacion de data 
*
* add Agregar registros
* read Consultar registros
*
* @author Isaac Betancourt
* @author http://www.isaacf7b.com
*
*/

interface CRUD_interface
{
    public function read($busqueda);
    public function add($data);
}

/**
* Esquema del model (class CursosOnline_model)
*
* Conexion y consulta de registro en la base de datos 
*
* add Agregar registros
* read Consultar registros
* delete Borrar registros 
* lastid obtener ultimo registro
*
* @author Isaac Betancourt
* @author http://www.isaacf7b.com
*
*/

class CursosOnline_model extends Conectar implements CRUD_interface
{

    public function read($busqueda)
    {   
        $sql="SELECT
        a.id,
        a.nb_cursos_online,
        a.ca_puntaje,
        a.ff_creacion,
        b.co_tipo_clase,
        c.nb_tipo_clase,
        d.nb_tipo_evaluacion 
    FROM
        j001t_cursos_online AS a
        LEFT JOIN j002t_cursos_online_detalle as b on b.co_cursos_online = a.id
        LEFT JOIN j004t_tipo_clase AS c on c.id = b.co_tipo_clase
        LEFT JOIN j003t_tipo_evaluacion as d on d.id = b.co_tipo_evaluacion
        WHERE (a.nb_cursos_online like '%$busqueda%' or c.nb_tipo_clase like '%$busqueda%') and a.in_activo = 1 order by a.id desc;";

        $mysqli = $this->conexion();
        $resultado = $mysqli->query($sql) or
        die($mysqli->error);

        $resultSet = [];

        while ($row = $resultado->fetch_object()) {;
            array_push($resultSet,$row);
            }
    
        return $resultSet;
    }

    public function add($data)
    {       
        $nb_cursos_online = $data['nb_cursos_online'];
        $ca_puntaje = $data['ca_puntaje'];

        $co_tipo_clase = $data['co_tipo_clase'];
        $co_tipo_evaluacion = $data['co_tipo_evaluacion'];

        $j001t_cursos_online = "INSERT INTO j001t_cursos_online (nb_cursos_online, ca_puntaje)
        VALUES ('$nb_cursos_online', $ca_puntaje)";

        $mysqli = $this->conexion();
        $mysqli->query($j001t_cursos_online);

        $dataLastId = $this->lastid();

        $j002t_cursos_online_detalle = "INSERT INTO j002t_cursos_online_detalle (co_cursos_online, co_tipo_clase, co_tipo_evaluacion)
         VALUES ('$dataLastId->id', $co_tipo_clase, $co_tipo_evaluacion)";

        $resultado = $mysqli->query($j002t_cursos_online_detalle);

        return $resultado;
    }

    public function delete($id)
    {       
        $j001t_cursos_online = "UPDATE j001t_cursos_online SET in_activo = 0 WHERE id = $id";

        $mysqli = $this->conexion();
        $resultado = $mysqli->query($j001t_cursos_online);

        return $resultado;
    }


    public function lastid()
    {       
        $sql="SELECT MAX(ID) as id FROM j001t_cursos_online as a;";

        $mysqli = $this->conexion();
        $resultado = $mysqli->query($sql) or
        die($mysqli->error);

        $mysqli = $this->conexion();
        $resultado = $mysqli->query($sql) or
        die($mysqli->error);

        return $resultado->fetch_object();
    }

}
?>