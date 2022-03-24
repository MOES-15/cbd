<?php 
include_once('config/config.php');
  $get = $conn->query("SELECT * FROM products");
  $row = $get->num_rows;
  if($row != 0){
    $data = $get->fetch_all(MYSQLI_ASSOC);
    foreach($data as $d){
      if($d['cantidad'] == 0){
        $amount = 'btn-danger';
        $btn = '<a href="product?_ref='.$d['id'].'" class="col-12 btn btn-danger mt-5 text-dark">Ver</a>';
      }else{
        $amount = 'btn-white';
        $btn = '<button class="col-12 btn btn-white mt-3 text-dark" add-cart="' . $d['id'] . '">Agregar al carrito</button><a href="product?_ref='.$d['id'].'" class="col-12 btn btn-cbd mt-2 text-dark">Comprar</a>';
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
                <div class="row col-10 mx-auto">
                    '. $btn .'
                </div>
        </div>';
    }
  }

?>