<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Highcbd</title>
    <link rel="stylesheet" href="dist/output.css">
    <style>
        .title-post{
            overflow:hidden; 
            text-overflow:ellipsis;
            display:-webkit-box; 
            -webkit-box-orient:vertical;
            -webkit-line-clamp:2;
        }
    </style>
</head>
<body class="h-screen w-screen p-0">
    <?php include 'template/header-web-dark.html'; ?>
    <div class="text-center md:mt-44 mt-32 md:text-6xl text-2xl font-bold">Bienvenid@ a nuestro blog</div>
    <div class="md:mx-10 mx-1 grid grid-cols-4 mt-32 mb-48">
        <?php
        include_once('config/config.php');
        $get = $conn->query("SELECT * FROM blog");
        $row = $get->num_rows;
        if($row != 0){
            $data = $get->fetch_all(MYSQLI_ASSOC);
            $num = count($data);
            for ($i = 0; $i < $num; $i++) {
                if($i == 0){
                    echo '<div class="grid grid-cols-2 col-span-4 mx-5 border mb-20 hover:shadow-lg  transition duration-500">
                    <div class="md:col-span-1 col-span-2 flex items-center justify-center flex-col md:h-auto h-72 md:px-auto px-7">
                        <a href="post?p_ref='. $data[$i]['titulo'] .'" class="md:w-8/12 md:text-4xl text-xl font-semibold hover:text-yellow-500">'. $data[$i]['titulo'] .'</a>
                        <div class="my-3 md:w-8/12">'. $data[$i]['fecha'] .' | '. $data[$i]['categoria_1'] .' - '. $data[$i]['categoria_2'] .'</div>
                        <div class="md:w-8/12 w-full mt-5 flex justify-end">
                                <a class="border-2 border-yellow-400 hover:bg-yellow-300 px-5 py-3 text-sm flex items-center" href="post?p_ref='. $data[$i]['titulo'] .'">LEER POST 
                                    <div class="ml-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                    </div>
                    <div class="md:col-span-1 col-span-2"><img src="assets/media/img/post/'. $data[$i]['imagen'] .'" alt="" class=""></div>
                </div>';
                }else if($i == 1){
                    echo '
                    <div class="grid grid-cols-2 col-span-4 mx-5 border mb-20 hover:shadow-lg  transition duration-500">
                    <div class="md:col-span-1 col-span-2"><img src="assets/media/img/post/'. $data[$i]['imagen'] .'" alt="" class=""></div>
                    <div class="md:col-span-1 col-span-2 flex items-center justify-center flex-col md:h-auto h-72 md:px-auto px-7">
                        <a href="post?p_ref='. $data[$i]['titulo'] .'" class="md:w-8/12 md:text-4xl text-xl font-semibold hover:text-yellow-500">'. $data[$i]['titulo'] .'</a>
                        <div class="my-3 md:w-8/12">'. $data[$i]['fecha'] .' | '. $data[$i]['categoria_1'] .' - '. $data[$i]['categoria_2'] .'</div>
                        <div class="md:w-8/12 w-full mt-5 flex justify-end">
                                <a class="border-2 border-yellow-400 hover:bg-yellow-300 px-5 py-3 text-sm flex items-center" href="post?p_ref='. $data[$i]['titulo'] .'">LEER POST 
                                    <div class="ml-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                    </div>
                </div>';
                }else{
                    echo '<div class="md:col-span-1 col-span-4 mx-5 border mb-10 hover:shadow-lg  transition duration-500">
                    <div class="h-64"><img src="assets/media/img/post/'. $data[$i]['imagen'] .'" alt=""></div>
                    <div class="h-52 px-7">
                    <div class="h-10 md:-mt-0 -mt-10">'. $data[$i]['fecha'] .' | '. $data[$i]['categoria_1'] .' - '. $data[$i]['categoria_2'] .'</div>
                        <a href="post?p_ref='. $data[$i]['titulo'] .'" class="h-14 title-post text-xl font-semibold hover:text-yellow-500 mt-5">'. $data[$i]['titulo'] .'</a>
                        <div class="mt-5 flex justify-end">
                            <a class="border-2 border-yellow-400 hover:bg-yellow-400 px-5 py-3 text-sm flex items-center" href="post?p_ref='. $data[$i]['titulo'] .'">LEER POST 
                                <div class="ml-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div> 
                </div>';
                }
            }
        }
        ?>
    </div>
    <?php include 'template/footer-web.html'; ?>
    <script src="assets/js/jquery.min.js"></script>
<script>
    $('#close-menu').on('click', function(){
        $('#menu-mobile').hide()
    })
    $('#open-menu').on('click', function(){
        $('#menu-mobile').show()
    })
</script>
</body>
</html>