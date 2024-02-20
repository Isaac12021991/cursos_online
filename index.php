<?php

spl_autoload_register(function($clase){
  require_once str_replace('\\', '/', $clase).'.php';
});

$Cursos_Online = [];
$CursosOnline_controller = new controller\CursosOnline_controller;

if (isset($_GET["search"])) {

  $Cursos_Online = $CursosOnline_controller->read($_GET["search"]);

}else{

  $Cursos_Online = $CursosOnline_controller->read('');

}

if (isset($_GET["eliminar"])) {

  $CursosOnline_controller->delete($_GET["eliminar"]);
  $Cursos_Online = $CursosOnline_controller->read('');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Alpha Technologies</title>
</head>
<body>
    
<div class="px-3 py-2 text-bg-dark border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">

            <div class="d-flex align-items-start  my-2 my-lg-0 me-lg-auto">

            <a href="./" class="text-white text-decoration-none me-4 mt-2">Inicio</a>

              <form class="navbar-search d-flex start-20" action="./" method="get">
                  <input class="form-control me-2" value="<?php if (isset($_GET["search"])) { echo $_GET["search"];} ?>" name="search" type="text" placeholder="Search" aria-label="Search">
                  <button class="btn btn-primary" type="submit">Buscar</button>
              </form>

            </div>


        </div>
      </div>
    </div>

    <div class="px-3 py-2">
      <div class="container d-flex flex-wrap justify-content-center">
        <div class="col-12 col-lg-auto mb-2 mb-lg-2 mt-lg-2 me-lg-auto">
          Inicio <?php if (isset($_GET["search"])) { echo '| Buscando: '.$_GET["search"];} ?>
        </div>

        <div class="text-end">
       
          <a href="./view/addView.php" class="btn btn-primary">Agregar</a>
        </div>
      </div>
    </div>


<main>

  <div class="py-2">
    <div class="container">
        <div class="row">

            <div class="col-12">

            <?php  if(count($Cursos_Online) > 0){ ?>
            <table class="table border table-striped" width="100%">
               <thead>
                  <tr>
                     <th width="10%">#</th>
                     <th width="30%">Tipo</th>
                     <th width="30%">Nombre</th>
                     <th width="30%">Detalle</th>
                     <th width="1%"></th>
                  </tr>
               </thead>
               <tbody>

            <?php $con = 0; foreach ($Cursos_Online as $key) { $con ++; ?>
              <tr>
              <td><?php echo $con; ?> </td>
              <td><?php echo $key->nb_tipo_clase; ?> </td>
              <td><?php echo $key->nb_cursos_online; ?> </td>

              <td>
                <?php if($key->co_tipo_clase == 1){ echo $key->ca_puntaje.'/5'; }; ?> 
                <?php if($key->co_tipo_clase == 2){ echo $key->nb_tipo_evaluacion; }; ?> 
              </td>

              <td> 
                
              <form action="./index.php" method="get">
                  <input value="<?php echo $key->id; ?>" name="eliminar" type="hidden">
                  <button class="btn btn-danger btn-sm" type="submit">X</button>
              </form>

              </td>
            
              </tr>
           <?php } ?> 
               </tbody>
            </table>
            <?php }else{ ?>

              Sin registro - No existe ninguna clase o examen registrado en la plataforma

            <?php }; ?>
        
            </div>

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