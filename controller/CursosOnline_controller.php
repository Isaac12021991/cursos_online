<?php
namespace controller;

use model\CursosOnline_model;

spl_autoload_register(function($clase){
    require_once str_replace('\\', '/', $clase).'.php';
});

/**
* Funcionas obligatorias para el uso de la aplicacion (abstract class CRUD) :)
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

abstract class CRUD 
{
    abstract protected function add($data);
    abstract protected function read($busqueda);
}

/**
* Controlador principal de la aplicacion (class CursosOnline_controller) :)
*
* lectura y validacion de data 
*
* Agregar registros
* Consultar registros
* Eliminar registros
*
* @author Isaac Betancourt
* @author http://www.isaacf7b.com
*
*/

class CursosOnline_controller extends CRUD
{
    public function read($busqueda)
    {
        /**
         * Devuelve la cantidad de registros que hay la base de datos
         *
         * Este metodo solo lee los registros de la base
         * de dato de las clases y examenes mostrandosela
         * al usuario
         *
         * @access public
         * @param string $busqueda nombre de los cursos o examenes
         * @return Lista de Clases y Examenes
         */
        $model = new CursosOnline_model;
        $Cursos_Online = $model->read($busqueda);
        return $Cursos_Online;
    }

    public function add($data)
    {   
        /**
         * Agrega un registro en la base de datos
         *
         * Este metodo inserta una clase o examen en la
         * base de datos
         *
         * @access public
         * @param array $data data a guardar en la base de datos
         * @return array
         */
        $error = 0;
        $response = '';

        if ($data["nb_cursos_online"] == ''){
            $error = 1;
            $response = 'Ingrese el nombre del curso o examen';
        }

        if ($data["ca_puntaje"] <= 0){
            $error = 1;
            $response = 'Ingrese un puntaje valido';
        }
        

        if ($error == 0){
            $model = new CursosOnline_model;
            $response = $model->add($data);

            if($response){
                $response = 'Se ha guardado exitosamente';
            }
        }

        $dataResp['response'] = $response;
        $dataResp['error'] = $error;

        return $dataResp;
    }

    public function delete($id)
    {   
        /**
         * Elimina un registro en la base de datos
         *
         * Este metodo elimina una clase o examen en la
         * base de datos
         *
         * @access public
         * @param string $id identificador de la tarea o clase
         * @return true o false
         */
        $error = 0;
        $response = '';

        if ($error == 0){
            $model = new CursosOnline_model;
            $response = $model->delete($id);

            if($response){
                $response = 'Se ha eliminado el registro';
            }
        }

        return $response;
    }

}
?>