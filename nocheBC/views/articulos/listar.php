<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  <title>Document</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>Lista Productos</h1>
      </div><!-- end col-->
    </div><!-- end row-->

    <div class="row">



      <?php foreach ($this->listar as $key => $value) {; # code...

    ?><div class="col-lg-4 col-md-6 col-sm-6 col-xs-4 p-3">
        <div class="card">
          <img class="card-img-top" src="<?=$value->url;?>" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">ID: <?=$value->id;?> <?=$value->codigo;?></h5>
            <p class="card-text"><?=$value->descripcion;?></p>
            <p class="card-text">$ <?=$value->precio;?></p>
            <input id="art-<?=$value->id;?>" class="form-control" value="1" type="number"></p>
            <a type="button" class="btn btn-primary"
              href="<?php echo constant('URL'); ?>articulos/verArticulo/<?=$value->id;?>">Ver</a>
            <button type="button" class="btn btn-primary btnAgregar"
              data-articulo-id="<?=$value->id;?>">Agregar</button>
          </div>

        </div><!-- end card -->
      </div><!-- end col --><?php }

;?>



    </div><!-- end row -->
  </div><!-- end container-->
  <?php require 'views/footer.php';?>



  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>public/js/articulos/listar.js">
  </script>



</body>

</html>