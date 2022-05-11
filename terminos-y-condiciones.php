<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body class="h-screen w-screen p-0">
    <?php include 'template/header-web-dark.html'; ?>
    <div class="md:mt-56 mt-32 h-full text-black">
        <div class="md:px-32 px-10">
            <div class="md:text-5xl text-2xl font-bold mt-10 mb-14 text-center">TERMINOS Y CONDICIONES</div>
            <div class="md:text-2xl">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae congue eu consequat ac felis donec et odio. Tortor at risus viverra adipiscing at in tellus integer feugiat. Felis eget nunc lobortis mattis. Diam vel quam elementum pulvinar etiam non quam lacus. Massa sapien faucibus et molestie ac feugiat sed lectus vestibulum. In mollis nunc sed id semper risus. Risus viverra adipiscing at in tellus integer. Risus at ultrices mi tempus imperdiet nulla malesuada. Neque ornare aenean euismod elementum nisi quis. Consequat ac felis donec et odio pellentesque diam volutpat commodo. Duis at consectetur lorem donec massa sapien faucibus et molestie. Facilisis mauris sit amet massa vitae tortor condimentum lacinia quis.
            </div>
        </div>
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