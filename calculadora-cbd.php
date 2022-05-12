<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla dosis | Highcbd</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body class="h-screen w-screen p-0">
<?php include 'template/header-web-dark.html'; ?>
    <div class="md:mt-56 mt-32 text-black">
        <div class="md:px-32 px-10">
            <div class="md:text-5xl text-2xl font-bold mt-10 mb-14 text-center">¿CUAL ES LA DOSIS CORRECTA DE CBD?</div>
            <div class="md:text-2xl text-base">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae congue eu consequat ac felis donec et odio. Tortor at risus viverra adipiscing at in tellus integer feugiat. Felis eget nunc lobortis mattis. Diam vel quam elementum pulvinar etiam non quam lacus. Massa sapien faucibus et molestie ac feugiat sed lectus vestibulum. In mollis nunc sed id semper risus. Risus viverra adipiscing at in tellus integer. Risus at ultrices mi tempus imperdiet nulla malesuada. Neque ornare aenean euismod elementum nisi quis. Consequat ac felis donec et odio pellentesque diam volutpat commodo. Duis at consectetur lorem donec massa sapien faucibus et molestie. Facilisis mauris sit amet massa vitae tortor condimentum lacinia quis.
            </div>
        </div>
        <div class="mt-10 md:p-10 p-5 md:w-auto w-96 overflow-x-scroll">
            <table class="md:w-full w-80 border-collapse border-2 border-slate-200 md:h-52 h-80 rounded-2xl">
                <thead>
                    <tr>
                      <th class="border-collapse md:w-auto w-96 border-2 border-slate-200 font-normal text-center" rowspan="2">CONDICIONES</th>
                      <th class="border-collapse md:w-auto w-96 border-2 border-slate-200 font-normal text-center py-3" colspan="6">PESO</th>
                    </tr>
                    <tr>
                      <th class="border-collapse border-2 md:px-0 px-20 border-slate-200 font-normal text-center py-3">11 KG</th>
                      <th class="border-collapse border-2 md:px-0 px-20 border-slate-200 font-normal text-center py-3">11 - 20 KG</th>
                      <th class="border-collapse border-2 md:px-0 px-20 border-slate-200 font-normal text-center py-3">20 - 38 KG</th>
                      <th class="border-collapse border-2 md:px-0 px-20 border-slate-200 font-normal text-center py-3">38 - 68 KG</th>
                      <th class="border-collapse border-2 md:px-0 px-20 border-slate-200 font-normal text-center py-3">68 - 108 KG</th>
                      <th class="border-collapse border-2 md:px-0 px-20 border-slate-200 font-normal text-center py-3">+108 KG</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <th class="border-collapse border-2 border-slate-200 font-normal text-center py-5" scope="row">LEVE</th>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">4.5 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">6 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">9 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">12 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">18 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">22.5 mg</td>
                      </tr>
                      <tr>
                        <th class="border-collapse border-2 border-slate-200 font-normal text-center py-5" scope="row">MEDIA</th>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">6 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">9 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">12 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">15 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">22.5 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">30 mg</td>
                      </tr>
                      <tr>
                        <th class="border-collapse border-2 border-slate-200 font-normal text-center py-5" scope="row">SEVERA</th>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">9 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">12 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">15 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">18 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">27 mg</td>
                        <td class="border-collapse border-2 border-slate-200 font-bold text-center">45 mg</td>
                      </tr>
                  </tbody>
            </table>
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