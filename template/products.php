<?php 
include_once('config/config.php');
  $get = $conn->query("SELECT * FROM products");
  $row = $get->num_rows;
  if($row != 0){
    $data = $get->fetch_all(MYSQLI_ASSOC);
    foreach($data as $d){
      if($d['cantidad'] == 0){
        $amount = 'btn-danger';
        $btn = '<a href="product?_ref='.$d['id'].'" class="col-12 btn btn-border-red mt-5 text-dark">Ver</a>';
      }else{
        $amount = 'btn-white';
        $btn = '<button class="col-12 btn btn-border-white mt-3 text-white" add-cart="' . $d['id'] . '">Agregar al carrito</button><a href="product?_ref='.$d['id'].'" class="col-12 btn btn-border-success mt-2 text-dark">Comprar</a>';
      }
        echo '
        <div>
          <div class="d-flex justify-content-start text-white">
            <div class="btn '. $amount .' text-dark fw-bold">'. $d['cantidad'] .'</div>
          </div>
            <div class="item">
                <a href="img/high-coco-1000.png" title="'. $d['nombre'] .' $'. number_format($d['precio'], 2, '.', ',') .'" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/'. $d['imagen'] .'">
                    <img src="img/'. $d['imagen'] .'" class="img-responsive" alt="img">
                </a>
                </div>
                <div class="class="row col-10 mx-auto text-center mb-5">
                  <div class="mt-2 mb-1 text-white fw-bold fs-3">
                    '. $d['nombre'] .'
                  </div>
                  <div class="mt-2 mb-1 text-white">
                    $'. number_format($d['precio'], 2, '.', ',') .'
                  </div>
                </div>
                <div class="row col-10 mx-auto mt-4">
                    '. $btn .'
                </div>
        </div>';
    }
  }

?>