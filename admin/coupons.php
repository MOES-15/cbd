<?php 
session_start();
if(empty($_SESSION['s']) || !isset($_SESSION['s'])){
  header('Location: session/logout');
}else{
    include_once('../config/config.php');
    $get = $conn->prepare("SELECT * FROM users WHERE id=?");
    $get->bind_param('s', $_SESSION['s']['i']);
    $get->execute();
    $result = $get->get_result();
    $row = $result->num_rows;
    if($row != 0){
      $data = $result->fetch_assoc();
    }else{
      header('Location: session/logout');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Juan Pablo Moreno">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Panel de control | Highcbdd</title>
    <link href="assets/css/styles.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/sidebars.css" rel="stylesheet">
    <meta name="facebook-domain-verification" content="pckd73x79n48e756cwua3m4j18n33m" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 901px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        .menu-mobile{
            display: none;
        }
      }
      @media (max-width: 900px) {
        .menu-desktop{
            display: none;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body class="bg-dark">
<div class="row me-0 px-0">
    <?php include('template/menu.php') ?>
    <div class="col-10 d-flex align-items-center justify-content-center mx-auto mt-1">
      <span style="height: 700px; overflow-y: scroll; width: 100%;">
        <div class="d-flex justify-content-end mt-3 mb-3">
          <button class="btn btn-border-white shadow text-white" data-bs-toggle="modal" data-bs-target="#create-coupon" ref="">Crear cupón</button>
        </div>
                    <?php
                            $get = $conn->query("SELECT * FROM coupons ORDER BY used ASC");
                            $row = $get->num_rows;
                            if($row != 0){
                              $data = $get->fetch_all(MYSQLI_ASSOC);
                              echo '<table class="table table-striped table-hover shadow">
                                      <thead>
                                          <th class="w-10 text-white">Cupón</th>
                                          <th class="w-15 text-white">Aplicado a</th>
                                          <th class="w-15 text-white">Descuento aplicable</th>
                                          <th class="w-15 text-white">Veces utilizado</th>
                                          <th class="w-15 text-white">Fecha de vencimiento</th>
                                          <th class="w-10"></th>
                                          <th class="w-15">
                                            <div class="input-group">
                                              <input type="text" class="form-control bg-transparent text-white" placeholder="Buscar" aria-describedby="basic-addon1" id="search-products">
                                              <span class="input-group-text bg-transparent text-white" id="basic-addon1">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                              </span>
                                            </div>
                                          </th>
                                      </thead>
                                      <tbody id="table-products">';
                              foreach($data as $d){
                                  echo '<tr>
                                            <td class="text-white">'. $d['coupon'] .'</td>
                                            <td class="text-white">';
                                            if($d['type'] == 'Productos'){
                                              $id = $d['id'];
                                              $get_p = $conn->query("SELECT * FROM products WHERE coupon='$id'");
                                              $d_p = $get_p->fetch_all(MYSQLI_ASSOC);
                                              foreach($d_p as $p){
                                                echo '- ' . $p['nombre'] .'<br>';
                                              }
                                            }else{
                                              echo 'Para toda la tienda';
                                            }
                                            echo '</td>
                                            <td class="text-white">'. $d['amount'] .'</td>
                                            <td class="text-white">'. $d['used'] .'</td>
                                            <td class="text-white">'. $d['date_due'] .'</td>
                                            <td><button class="btn btn-border-success col-12 col-md-10 shadow" data-bs-toggle="modal" data-bs-target="#edit-coupon" ref="'. $d['id'] .'">Editar</button></td>
                                            <td><button class="btn btn-border-red col-12 col-md-10 shadow" action="delete-coupon" ref="'. $d['id'] .'">Eliminar</button></td>
                                        </tr>';
                              }
                              echo '</tbody>
                                  </table>';
                            }else{
                              echo '<div class="w-100 mt-5 fs-4 py-5 text-center text-white" space="search-empty">No tienes ningun cupón aun</div>';
                            }
                        ?>
            <div class="text-center py-3 d-none text-white" space="empty-search">No se encontro el producto</div>
          </span>
    </div>
    <div class="position-absolute text-center mx-auto bottom-0 mb-3 text-white">&copy; Desarrollado en <a href="https://madigen.mx" class="text-white">Madigen</a> por Pablo Moreno</div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit-coupon" tabindex="-1" aria-labelledby="edit-data-product" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-header text-center px-3">
        <h5 class="modal-title">Editar cupón</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row d-flex justify-content-between">
            <div class="col-12 row">
              <div class="col-md-5 col-12 mx-1">
                  <input type="hidden" id="id-cupon">
                  <div class="fw-bold mb-2">Cupón: </div>
                  <input type="text" name="" id="cupon" placeholder="Cupón" class="form-control">
              </div>
              <div class="col-md-6 col-12 mx-1">
                  <div class="fw-bold mb-2">Descuento: </div>
                  <input type="text" name="" id="descuento" placeholder="Descuento" class="form-control">
              </div>
              <div class="col-5 mx-1 mt-3">
                  <div class="fw-bold mb-2">Tipo de descuento: </div>
                  <select class="form-select" aria-label="Default select example" aria-describedby="basic-addon2" id="tipo">
                      <option value="Cantidad">Cantidad</option>
                      <option value="Porcentaje">Porcentaje</option>
                    </select>
              </div>
              <div class="col-6 mx-1 mt-3">
                  <div class="fw-bold mb-2">Fecha de vencimiento: </div>
                  <input type="text" name="" id="fecha" placeholder="Fecha de vencimiento" class="form-control">
              </div>
              <div class="col-11 mx-1 mt-3">
                  <div class="fw-bold mb-2">Aplica para: </div>
                    <select class="form-select" aria-label="Default select example" aria-describedby="basic-addon2" id="tipo-aplica-coupon">
                      <option value="Toda la tienda">Toda la tienda</option>
                      <option value="Productos">Productos</option>
                    </select>
              </div>
              <div class="col-12 mx-1 mt-3 d-none" id="list-products-coupon">
              <div class="text-center text-danger fs-6 mt-3 d-none" id="alert-cupon">Selecciona minimo un producto</div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-border-success shadow" action="save-changes">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="create-coupon" tabindex="-1" aria-labelledby="edit-data-product" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-header text-center px-3">
        <h5 class="modal-title text-grad-baterrey" id="edit-data-product"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row d-flex justify-content-between">
            <div class="col-12 row">
              <div class="col-md-5 col-12 mx-1">
                  <div class="fw-bold mb-2">Cupón: </div>
                  <input type="text" name="" id="cupon-new" placeholder="Cupón" class="form-control">
              </div>
              <div class="col-md-6 col-12 mx-1">
                  <div class="fw-bold mb-2">Descuento: </div>
                  <input type="text" name="" id="descuento-new" placeholder="Descuento" class="form-control">
              </div>
              <div class="col-5 mx-1 mt-3">
                  <div class="fw-bold mb-2">Tipo de descuento: </div>
                    <select class="form-select" aria-label="Default select example" aria-describedby="basic-addon2" id="tipo-new">
                      <option value="Cantidad">Cantidad</option>
                      <option value="Porcentaje">Porcentaje</option>
                    </select>
              </div>
              <div class="col-6 mx-1 mt-3">
                  <div class="fw-bold mb-2">Fecha de vencimiento: </div>
                  <input type="text" class="form-control" name="" id="fecha-new" value="" />
              </div>
              <div class="col-11 mx-1 mt-3">
                  <div class="fw-bold mb-2">Aplica para: </div>
                    <select class="form-select" aria-label="Default select example" aria-describedby="basic-addon2" id="tipo-aplica-new">
                      <option value="Toda la tienda">Toda la tienda</option>
                      <option value="Productos">Productos</option>
                    </select>
              </div>
              <div class="col-12 mx-1 mt-3 d-none" id="list-products">
                <?php 
                $get = $conn->query("SELECT * FROM products WHERE coupon=''");
                $row = $get->num_rows;
                if($row != 0){
                  $data = $get->fetch_all(MYSQLI_ASSOC);
                  $num = 0;
                    echo '<div class="mt-3 text-center mb-3 fw-bold fs-6">Estos son los productos existentes</div>';
                    foreach($data as $d){
                      $num += 1;
                      echo '<div class="form-check py-1">
                      <input class="form-check-input" name="product" type="checkbox" value="'. $d['id'] .'" id="product-'. $num .'">
                      <label class="form-check-label" for="product-'. $num .'">
                      '. $d['nombre'] .' $'. $d['precio'] .'
                      </label>
                      </div>';
                    }
                }else{
                  echo '<div class="text-center fw-bold fs-6 my-5">No tienes productos disponibles</div>';
                }
                ?>
                <div class="text-center text-danger fs-6 mt-3 d-none" id="alert">Selecciona minimo un producto</div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-border-success shadow" action="save-new">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="view-products" tabindex="-1" aria-labelledby="edit-data-product" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-header text-center px-3">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row d-flex justify-content-between">
            <div class="col-12 row">
              <div class="col-12 mx-1 mt-3" id="list-products-coupon">
                <div id="message" class="text-center fs-6 fw-bold my-5">Cargando..</div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

      <script src="assets/js/styles.min.js"></script>
      <script src="assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
      <script src="assets/js/sidebars.js?v"></script>
      <script src="assets/js/coupons.js?v"></script>
  </body>
</html>
