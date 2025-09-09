<?php
include_once '../model/auth.php';
checkLogin(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="../assets/imagenes/icono.ico" />
  <title>SISTEMA GRUPALES UPDATE PRUEBA</title>
  <link href="../assets/plugin/Bootstrap5.3/css/bootstrap.min.css" rel="stylesheet" >
  <link href="../assets/plugin/fontawesome6.7.2/css/all.min.css" rel="stylesheet">
  <link href="../assets/plugin/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="../assets/plugin/datatable/css/scroller.bootstrap5.min.css" rel="stylesheet" />
  <link href="../assets/plugin/datatable/css/dataTables.responsive.css" rel="stylesheet" />
  <link href="../assets/plugin/sweetalert2/sweetalert2_theme-borderless_borderless.css" rel="stylesheet" />
  <link href="../assets/plugin/anime/animate.min.css" rel="stylesheet">
  <link href="../assets/plugin/select2/css/select2.min.css" rel="stylesheet" />
  <link href="../assets/plugin/select2/css/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
  <link href="../assets/plugin/jquery-ui1.14.1/jquery-ui.css" rel="stylesheet" />
  <link href="../assets/plugin/jquery-ui1.14.1/jquery-ui.theme.css" rel="stylesheet" />
  
  
  <style>
    /* Aplicamos Comic Sans a toda la página */
    body { font-family: 'Comic Sans MS', cursive, sans-serif; }
    .shadow-text { text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);}
  </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

  <!-- Menú Horizontal con bg-secondary y bg-gradient -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary bg-gradient fixed-top">
  <div class="container-fluid">
    <!-- Menú alineado a la izquierda -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="./">
            <i class="fas fa-home me-2"></i> Inicio
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-layer-group"></i> Generar Tramas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="?ruta=<?php echo base64_encode('facturamanual'); ?>">
                <i class="fa-solid fa-circle fa-xs me-2"></i>Trama Factura Manual
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-copy"></i> Unificar PreLiquidaciones
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="?ruta=<?php echo base64_encode('unificar'); ?>">
                <i class="fa-solid fa-circle fa-xs me-2"></i>Unificar
              </a>
            </li>
          </ul>
        </li>
  
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-gears fa-sm"></i> Configuración
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="?ruta=<?php echo base64_encode('responsables'); ?>">
                <i class="fa-solid fa-circle fa-xs me-2"></i>Gestionar Responsables
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="?ruta=<?php echo base64_encode('empresa'); ?>">
                <i class="fa-solid fa-circle fa-xs me-2"></i>Gestionar Empresas
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="?ruta=<?php echo base64_encode('programas'); ?>">
                <i class="fa-solid fa-circle fa-xs me-2"></i>Gestionar Programas
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="?ruta=<?php echo base64_encode('grupoeconomico'); ?>">
                <i class="fa-solid fa-circle fa-xs me-2"></i>Gestionar Grupo Economico
              </a>
            </li>


            <li>
              <a class="dropdown-item" href="?ruta=<?php echo base64_encode('usuarios'); ?>">
                <i class="fa-solid fa-circle fa-xs me-2"></i>Gestionar Usuarios
              </a>
            </li>


          
          </ul>
        </li>

      </ul>
    </div>



      <!-- Menú de usuario -->
      <div class="user-box dropdown px-3 top-menu ms-auto text-white">
        <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="user-info">
            <p class="user-name mb-0 text-white"><?php echo  $_SESSION['nom_completo'];?></p>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item d-flex align-items-center" href="?ruta=<?php echo base64_encode('usuarios'); ?>"><i class="fa-solid fa-gears fa-sm me-2"></i><span>Configuración</span></a></li>
          <li><div class="dropdown-divider mb-0"></div></li>
          <li><a class="dropdown-item d-flex align-items-center" id="logout" href="../model/logoutmodel.php"><i class="fa fa-sign-out-alt me-2"></i><span> Salir</span></a></li>
        </ul>
      </div>


    
    <!-- Botón de menú responsive (se mueve con el collapse) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


  <!-- Contenedor principal con la clase d-flex para que se ajuste a la pantalla completa -->
  <div class="container flex-fill mt-5 pt-5">
    <div class="row">
      <!-- Contenido aquí -->
          <?php
          $pagina = isset($_GET['ruta']) ? strtolower(base64_decode($_GET['ruta'])) : 'home';
          ?>
          <?php
          if (!isset($_GET['ruta'])) {
            require_once '../view/' . $pagina . '.php';
          } else {
             if (preg_match('/^[a-z0-9_]+$/', $pagina) && isValid($pagina)) {
              require_once '../view/' . $pagina . '.php';
            } else {
              require_once '../view/404.php';
            }
          }
          ?>
    </div>
  </div>


  <!-- Footer fijo -->
  <footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <strong>Copyright &copy; <?php $year = date("Y"); if ($year == 2025) { echo "2025"; } else { echo "2025 - " . $year; } ?>. Auna - Area Grupales. </strong> Todos los Derechos Reservados.
  </footer>
 
  <?php
  function isValid($pagina)
  {
    $valid = false;
    if (file_exists($file = '../view/' . $pagina . '.php')) {
      $valid = true;
    }
    return $valid;
  }
  ?>
  <!-- Scripts  -->
  <script src="../assets/plugin/jquery/jquery-3.7.0.min.js"></script>
  <script src="../assets/plugin/Bootstrap5.3/js/bootstrap.bundle.min.js" ></script>
  <script src="../assets/plugin/datatable/js/jquery.dataTables.min.js"></script>
  <script src="../assets/plugin/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="../assets/plugin/datatable/js/dataTables.scroller.min.js"></script>
  <script src="../assets/plugin/datatable/js/dataTables.responsive.js"></script>
  <script src="../assets/plugin/select2/js/select2.min.js"></script>
  <script src="../assets/plugin/sweetalert2/sweetalert2.min.js"></script>
  <script src="../ajax/valida_index.js"></script>
  <script src="../ajax/valida_usuario.js"></script>
  <script src="../ajax/valida_responsables.js"></script>
  <script src="../ajax/valida_programa.js"></script>
  <script src="../ajax/valida_empresa.js"></script>
  <script src="../ajax/valida_grupoeconomico.js"></script>
  <script src="../ajax/valida_facturamanual.js"></script>
  <script src="../ajax/valida_unificar.js"></script>



</body>
</html>

