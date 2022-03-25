<?php 
include_once('config/config.php');
  $get = $conn->query("SELECT * FROM products");
  $row = $get->num_rows;
  if($row != 0){
    $data = $get->fetch_all(MYSQLI_ASSOC);
    foreach($data as $d){
      if($d['cantidad'] == 0){
        $amount = 'btn-danger';
        $btn = '<a href="product?_ref='.$d['id'].'" class="col-12 btn btn-border-red mt-5 text-dark fs-7 px-3">Ver</a>';
      }else{
        $amount = 'btn-dark';
        $btn = '<button class="col-12 btn btn-border-dark mt-3 text-dark fs-7 px-3" add-cart="' . $d['id'] . '">Agregar al carrito</button><a href="product?_ref='.$d['id'].'" class="col-12 btn btn-border-success mt-2 text-dark fs-7 px-3">Comprar</a>';
      }
        echo '
        <div class="mx-4 border-product">
          <div class="d-flex justify-content-start text-white">
            <div class="btn '. $amount .' text-white fw-bold">'. $d['cantidad'] .'</div>
          </div>
            <div class="item">
                <a href="img/high-coco-1000.png" title="'. $d['nombre'] .' $'. number_format($d['precio'], 2, '.', ',') .'" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/'. $d['imagen'] .'">
                    <img src="img/'. $d['imagen'] .'" class="img-responsive" alt="img" style="">
                </a>
                </div>
                <div class="class="row col-10 mx-auto text-center mb-5">
                  <div class="mt-5 mb-1 text-dark fw-bold fs-4">
                    '. $d['nombre'] .'
                  </div>
                  <div class="mt-2 mb-1 text-dark">
                    $'. number_format($d['precio'], 2, '.', ',') .'
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <div class="row col-md-10 col-sm-12 mx-auto mt-4">
                  '. $btn .'
                  </div>
                </div>
        </div>';
    }
  }

?>