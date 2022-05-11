<?php 
include_once('config/config.php');
  $get = $conn->query("SELECT * FROM products");
  $row = $get->num_rows;
  if($row != 0){
    $data = $get->fetch_all(MYSQLI_ASSOC);
    foreach($data as $d){
      if($d['cantidad'] == 0){
        $btn = '
        <div class="my-4 bg-white border-4 border-black hover:bg-black py-4 hover:text-white rounded-full flex justify-center">
          <a class="text-lg" href="producto?_ref='.$d['id'].'">MAS INFORMACIÓN</a>
        </div>
        ';
      }else{
        $btn = '
        <div class="my-4 bg-white border-4 border-black hover:bg-black py-4 hover:text-white rounded-full flex justify-center">
          <a class="text-lg" href="producto?_ref='.$d['id'].'">MAS INFORMACIÓN</a>
        </div>
        <button class="text-lg bg-white border-4 border-black hover:bg-black w-full h-16 my-2 hover:text-white rounded-full" add-cart="' . $d['id'] . '">AGREGAR AL CARRITO</button>';
      }
        echo '





        <div class="md:col-span-1 col-span-2 px-6 mb-20">
                    <div class="w-full flex justify-center">
                        <img src="assets/media/img/'. $d['imagen'] .'" alt="" width="300px">
                    </div>
                    <div class="mt-10 mb-10 text-center text-4xl font-bold">'. $d['nombre'] .'</div>
                    <div class="grid grid-cols-2">
                        <div class="md:col-span-1 col-span-2">
                        '. $btn .'
                        </div>
                        <div class="md:col-span-1 col-span-2 flex items-center justify-center md:text-7xl text-4xl font-bold md:my-0 my-10">
                            $'. number_format($d['precio'], 0, '.', ',') .'
                        </div>
                    </div>
                </div>';
    }
  }

?>