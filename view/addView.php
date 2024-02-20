<?php

spl_autoload_register(function($clase){

  require_once '../'.str_replace('\\', '/', $clase).'.php';
});

$Cursos_Online = [];
$CursosOnline_controller = new controller\CursosOnline_controller;

if (isset($_GET["search"])) 
{

  $Cursos_Online = $CursosOnline_controller->read($_GET["search"]);

}

if (isset($_GET["nb_cursos_online"])) 
{

  $responseData = $CursosOnline_controller->add($_GET);

  if ($responseData->error == 0){
    header("Location: ../index.php");
    exit();
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Alpha Tecnologies</title>
</head>
<body>
    
<div class="px-3 py-2 text-bg-dark border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">

            <div class="d-flex align-items-start  my-2 my-lg-0 me-lg-auto">

            <a href="../" class="text-white text-decoration-none me-4 mt-2">Home</a>

              <form class="navbar-search d-flex start-20" action="../" method="get">
                  <input class="form-control me-2" name="search" type="text" placeholder="Search" aria-label="Search">
                  <button class="btn btn-primary" type="submit">Search</button>
              </form>

            </div>


        </div>
      </div>
    </div>

    
    <div class="px-3 py-2">
      <div class="container d-flex flex-wrap justify-content-center">
        <div class="col-12 col-lg-auto mb-2 mb-lg-2 mt-lg-2 me-lg-auto">
          Agregar Clase o Examen
        </div>

        <div class="text-end">
       

        </div>
      </div>
    </div>


<main>

  <div class="py-5">
    <div class="container">
        <div class="row">
        <div class="col-12 d-flex flex-wrap justify-content-center mb-4"> 
          <?php if (isset($responseData)) { echo $responseData->response; }  ?>
        </div>
        
          <div class="col-4"> </div>
            <div class="col-4">

                <form action="./addView.php" method="get">
                <div class="mb-3">
                  <label class="form-label">Nombre del curso</label>
                  <input type="text" autofocus='autofocus' name="nb_cursos_online" placeholder="Ejem: Vocabulario sobre Trabajo en Inglés" class="form-control">
                  <div class="form-text">Ingrese el nombre del curso.</div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tipo de clase</label>
                  <select class="form-select" name="co_tipo_clase">
                  <option selected value="1">Clases</option>
                  <option value="2">Examenes</option>
                </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Puntaje</label>
                  <input type="number" max="5" min="1" value="1" name="ca_puntaje" class="form-control">
                  <div class="form-text">Ingrese el el puntaje.</div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tipo de evaluacion</label>
                  <select class="form-select" name="co_tipo_evaluacion">
                  <option selected value="1">Selección</option>
                  <option value="2">Pregunta</option>
                  <option value="3">Respuesta</option>
                  <option value="4">Completacion</option>

                </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
            <div class="col-4"> </div>

        </div>
    </div>
  </div>

</main>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">Prueba técnica de Alpha Technologies - Gustavo Quero</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="www.isaacf7b.com" class="nav-link px-2 text-body-secondary">Prueba realizada por el programador: Isaac Betancourt - Isaacf7b.com</a></li>
        </ul>
    </footer>
  </div>
    
</body>
</html>
<script src="/assets/bootstrap-5.3.2-dist//js/bootstrap.bundle.min.js"></script>