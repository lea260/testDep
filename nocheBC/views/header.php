<?php require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary ps-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo constant('URL'); ?>"><?=Translate::__('home');?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo constant('URL'); ?>articulos/nuevo">
            <button type="button" class="btn btn-primary position-relative">Articulos</button>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <button type="button" class="btn btn-primary position-relative">Listar Articulos</button>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo constant('URL'); ?>articulos/listar">Articulos</a></li>
            <li><a class="dropdown-item" href="<?php echo constant('URL'); ?>pedidos">Pedidos</a></li>
            <li><a class="dropdown-item" href="<?php echo constant('URL'); ?>pdf/generar2">Pdf</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?php echo constant('URL'); ?>idioma">Idioma</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo constant('URL'); ?>carrito/ver"> <button type="button"
              class="btn btn-primary position-relative">
              Carrito
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                id="cantidadElemCarrito">
                0
              </span>
            </button>
          </a>
        </li>


      </ul>
      <div class="d-flex">
        <?php if (isset($_SESSION["estalogueado"])) {
    $estaLogueado = $_SESSION["estalogueado"];
} else {
    $estaLogueado = false;
}
$estaLogueado = isset($_SESSION["estalogueado"]) ? $_SESSION["estalogueado"] : false;
if ($estaLogueado) {
    ?><?php $nombre = $_SESSION["nombre"];?>
        <a class="btn btn-outline-light" href="#"><?php echo $nombre; ?></a>
        <a class="btn btn-outline-light mx-2" href="<?php echo constant('URL'); ?>login/salir">Salir</a>
        <?php } else {
    ?>
        <a class="btn btn-outline-light mx-2" href="<?php echo constant('URL'); ?>login">Ingresar</a>
        <?php }
;?>

      </div>
    </div>
  </div>
</nav>