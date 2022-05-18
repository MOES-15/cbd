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
            <table class="table table-striped table-hover shadow">
                <thead>
                    <th class="w-10 text-white">SKU</th>
                    <th class="w-25 text-white">Producto</th>
                    <th class="w-10 text-white">Vistas</th>
                    <th class="w-10 text-white">Inventario</th>
                    <th class="w-15">
                      <div class="input-group">
                        <input type="text" class="form-control bg-transparent text-white" placeholder="Busca el producto" aria-describedby="basic-addon1" id="search-products">
                        <span class="input-group-text bg-transparent text-white" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                        </span>
                      </div>
                    </th>
                </thead>
                <tbody id="table-products">
                    <?php
                    include_once('../config/config.php');
                            $get = $conn->query("SELECT * FROM products ORDER BY vistas ASC");
                            $row = $get->num_rows;
                            if($row != 0){
                              $data = $get->fetch_all(MYSQLI_ASSOC);
                              foreach($data as $d){
                                  echo '<tr>
                                            <td class="text-white">'. $d['sku'] .'</td>
                                            <td class="text-white">'. $d['nombre'] .'</td>
                                            <td class="text-white">'. $d['vistas'] .'</td>
                                            <td class="text-white">'. $d['cantidad'] .'</td>
                                            <td><button class="btn btn-border-success col-12 col-md-10 shadow" data-bs-toggle="modal" data-bs-target="#edit-data" ref="'. $d['id'] .'">Editar</button></td>
                                        </tr>';
                              }
                            }else{
                              echo '<div class="w-100 mt-5 fs-4 py-5 d-none text-center" space="search-empty">No se encontraron resultados</div>';
                            }
                        ?>
                </tbody>
            </table>
            <div class="text-center py-3 d-none text-white" space="empty-search">No se encontro el producto</div>
          </span>
    </div>
    <div class="position-absolute text-center mx-auto bottom-0 mb-3 text-white">&copy; Desarrollado en <a href="https://madigen.mx" class="text-white">Madigen</a> por Pablo Moreno</div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit-data" tabindex="-1" aria-labelledby="edit-data-product" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-header text-center px-3">
        <h5 class="modal-title text-dark fw-bold" id="edit-data-product"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row d-flex justify-content-between">
            <div class="col-12 row">
              <div class="col-md-5 col-12 mx-1">
                  <input type="hidden" id="id-product">
                  <div class="fw-bold mb-2">SKU: </div>
                  <input type="text" name="" id="sku-product" placeholder="SKU" class="form-control">
              </div>
              <div class="col-12 mx-1 mt-3">
                  <div class="fw-bold mb-2">Cantidad: </div>
                  <input type="text" name="" id="cantidad-product" placeholder="Inventario" class="form-control">
              </div>
              <div class="col-12 mx-1 mt-3">
                  <div class="fw-bold mb-2">Precio: </div>
                  <input type="text" name="" id="price-product" placeholder="Precio" class="form-control">
              </div>
              <div class="col-12 mt-3 mx-1">
                  <div class="fw-bold mb-2">Nombre: </div>
                  <input type="text" name="" id="name-product" placeholder="Nombre" class="form-control">
              </div>
              <div class="mt-3 row d-none" id="coupon-apply">
                <div class="fw-bold mt-4 mb-3">Cupón aplicado: </div>
                <div class="col-8" id="coupon"></div>
                <div class="col-4">
                  <button type="button" class="btn btn-border-red" action="delete-coupon" id="id-coupon" ref="">Borrar cupón</button>
                </div>
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

      <script src="assets/js/styles.min.js"></script>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/sidebars.js"></script>
      <script src="assets/js/data.js"></script>
  </body>
</html>
