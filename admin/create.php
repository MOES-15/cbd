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
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
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
    <div class="w-100 d-flex justify-content-center align-items-center flex-column my-5">
			<div class="card shadow" style="width: 80rem;">
				<div class="card-header text-center">
					<div class="card-title fs-4 fw-bold">
						Crear publicación</div>
				</div>
				<form class="card-body" action="<?php echo htmlspecialchars('234142/ap.php'); ?>" style="width: 100%;" id="data_publication" method="POST" enctype="multipart/form-data">
					<div class="row col-md-12 mx-auto">
						<div class="col-md-12 mt-2">
							<label class="form-label fs-6 fw-bold required">Titulo de la publicación</label>
							<input maxlength="125" name="title" class="form-control" type="text" placeholder="Ej. Madigen la agencia revolucionaria y creativa con un estilo único e innovador." required>
						</div>
					</div>
					<div class="row col-md-12 mx-auto mt-3">
						<div class="col-md-6 mt-2">
							<label class="form-label fs-6 fw-bold required">Ingresa un nombre de autor</label>
							<input maxlength="67" name="autor" class="form-control" type="text" placeholder="Ej. Madigen" required>
						</div>
						<div class="col-md-6 mt-2 px-5">
							<label class="form-label fw-bold required"><span class="fs-6">Agrega una imagen de portada</span> <span class="fs-7">(solo .jpg con una altura de 1280px por 1920px de ancho)</span></label>
							<input name="image_data" type="file" id="file" accept=".jpg" required>
						</div>
					</div>
					<div class="row col-md-12 mx-auto mt-3">
						<div class="col-md-12 mt-2">
							<label class="form-label fs-6 fw-bold required">Ingresa una pequeña descripción</label>
							<textarea name="description-small" class="form-control" maxlength="155" rows="2" placeholder="Una agencia de tecnologías *SaaS orientadas al Marketing digital, ayudamos personas a alcanzar sus objetivos entendiendo el momentum de su negocio y explotando sus áreas de oportunidad." required></textarea>
						</div>
					</div>
					<div class="row col-md-12 mx-auto mt-3">
						<div class="col-md-4 mt-2 px-2">
							<label class="form-label fs-6 fw-bold required">Categoria relacionada 1</label>
							<select class="form-select" name="category_one" aria-label="Categoria relacionada 1" required>
								<option value="Mascotas">Mascotas</option>
								<option value="Salud">Salud</option>
								<option value="Seguros">Seguros</option>
								<option value="Finanzas">Finanzas</option>
								<option value="Moda">Moda</option>
								<option value="Estilo de vida">Estilo de vida</option>
								<option value="Decoración y hogar">Decoración y hogar</option>
								<option value="Educación en línea">Educación en línea</option>
								<option value="Apps y tilidad">Apps y tilidad</option>
								<option value="Cupones">Cupones</option>
								<option value="Lotería">Lotería</option>
								<option value="Videojuegos">Videojuegos</option>
								<option value="Juegos y Apuestas">Juegos y Apuestas</option>
								<option value="Citas amorosas">Citas amorosas</option>
								<option value="Noticias">Noticias</option>
								<option value="Arte">Arte</option>
								<option value="Hosting">Hosting</option>
								<option value="Nutra/Nutrición">Nutra/Nutrición</option>
								<option value="Viajes">Viajes</option>
								<option value="Hospedaje">Hospedaje</option>
								<option value="Vuelos">Vuelos</option>
								<option value="Educación">Educación</option>
								<option value="Video convencional">Video convencional</option>
								<option value="Comercio electrónico">Comercio electrónico</option>
								<option value="Negocios">Negocios</option>
								<option value="Software">Software</option>
								<option value="Deportes">Deportes</option>
								<option value="Email Marketing">Email Marketing</option>
								<option value="Oferta Laboral">Oferta Laboral</option>
								<option value="Tecnología">Tecnología</option>
								<option value="Marketing Digital">Marketing Digital</option>
								<option value="Música">Música</option>
								<option value="Cine">Cine</option>
								<option value="Otros">Otros</option>
							</select>
						</div>
						<div class="col-md-4 mt-2 px-2">
							<label class="form-label fs-6 fw-bold required">Categoria relacionada 2</label>
							<select class="form-select" name="category_two" aria-label="Categoria relacionada 2" required>
								<option value="Mascotas">Mascotas</option>
								<option value="Salud">Salud</option>
								<option value="Seguros">Seguros</option>
								<option value="Finanzas">Finanzas</option>
								<option value="Moda">Moda</option>
								<option value="Estilo de vida">Estilo de vida</option>
								<option value="Decoración y hogar">Decoración y hogar</option>
								<option value="Educación en línea">Educación en línea</option>
								<option value="Apps y tilidad">Apps y tilidad</option>
								<option value="Cupones">Cupones</option>
								<option value="Lotería">Lotería</option>
								<option value="Videojuegos">Videojuegos</option>
								<option value="Juegos y Apuestas">Juegos y Apuestas</option>
								<option value="Citas amorosas">Citas amorosas</option>
								<option value="Noticias">Noticias</option>
								<option value="Arte">Arte</option>
								<option value="Hosting">Hosting</option>
								<option value="Nutra/Nutrición">Nutra/Nutrición</option>
								<option value="Viajes">Viajes</option>
								<option value="Hospedaje">Hospedaje</option>
								<option value="Vuelos">Vuelos</option>
								<option value="Educación">Educación</option>
								<option value="Video convencional">Video convencional</option>
								<option value="Comercio electrónico">Comercio electrónico</option>
								<option value="Negocios">Negocios</option>
								<option value="Software">Software</option>
								<option value="Deportes">Deportes</option>
								<option value="Email Marketing">Email Marketing</option>
								<option value="Oferta Laboral">Oferta Laboral</option>
								<option value="Tecnología">Tecnología</option>
								<option value="Marketing Digital">Marketing Digital</option>
								<option value="Música">Música</option>
								<option value="Cine">Cine</option>
								<option value="Otros">Otros</option>
							</select>
						</div>
            <div class="col-md-4 mt-2 px-2">
							<label class="form-label fs-6 fw-bold">Video Youtube (opcional)</label>
								<input type="text" class="form-control" name="video" maxlength="60" placeholder="Ej. https://www.youtube.com/watch?v=o6NCTfXodgY">
						</div>
					</div>
					<div class="row col-md-12 mx-auto mt-3">
						<div class="col-md-12 mt-2">
							<label class="form-label fs-6 fw-bold required">Ingresa el post</label>
							<textarea id="post_body" placeholder="Una agencia de tecnologías *SaaS orientadas al Marketing digital, ayudamos personas a alcanzar sus objetivos entendiendo el momentum de su negocio y explotando sus áreas de oportunidad. Esto nos permite trabajar con pequeñas empresas, grandes corporativos o grupos con múltiples marcas y modelos de negocios. *SaaS - Software as a Service"></textarea>
							<input name="description" type="hidden" required>
						</div>
					</div>
				</form>
          <div class="d-flex justify-content-center align-items-center mb-2">
            <button type="button" class="btn btn-success btn-lg" id="add_publication">Crear publicación</button>
          </div>
          <div class="alert alert-danger mx-auto w-50 d-none mt-3" role="alert" id="alert">
            <div class="d-flex justify-content-center fs-6" id="text-alert"></div>
          </div>
		</div>
    </div>
</div>

      <script src="assets/js/styles.min.js"></script>
      <script src="assets/js/jquery.min.js"></script>
      <?php 
					if(isset($_GET['error'])){
						if($_GET['error'] == 1){
							$text = 'Ya existe un post con ese nombre';
						}else if($_GET['error'] == 'error'){
							$text = 'Hubo un error inesperado, intentalo de nuevo';
						}else if($_GET['error'] == 'null'){
							$text = 'Todos los campos son obligatorios';
						}
            echo $text;
						echo '
						<script>
						$("#text-alert").html("'. $text .'");
						$("#alert").removeClass("d-none");
						setTimeout(function(){
							$("#alert").addClass("d-none");
						}, 7000);
						</script>';
					} 
			?>
      <script>
        let theEditor;
		  ClassicEditor.create( document.querySelector( '#post_body' ) ).then( editor => {theEditor = editor;} ).catch( error => {console.error( error );} );function getDataFromTheEditor() {return theEditor.getData();}
		  var validate_img = false;
      $('[name="image_data"]').on('change', function(){
			var imagen = document.getElementById("file").files[0];
			var _URL = window.URL || window.webkitURL;
			var img = new Image();
			img.src = _URL.createObjectURL(imagen);
			img.onload = function () {
				console.log(img.height +' '+img.width);
				var medidas = img.height +'x'+img.width;
				if(medidas == '1280x1920'){
					console.log(true);
					validate_img = true;
				}else{
					$("#alert").removeClass("d-none");
					$('#text-alert').html('La imagen no respeta las dimensiones 1920 ancho x 1280 alto (px)');
					setTimeout(function(){
						$("#alert").addClass("d-none");
						$('#add_publication').prop('disabled', false);

					}, 6000);
					validate_img = false;
				}
			}
		})
		function alert(){
			$("#alert").removeClass("d-none");
			$('#text-alert').html('Todos los campos son obligatorios');
			setTimeout(function(){
				$("#alert").addClass("d-none");
				$('#add_publication').prop('disabled', false);
			}, 6000);
		}
		$('#add_publication').on('click', function() {
			var text = theEditor.getData();

			$('#add_publication').prop('disabled', true);
			var title = $('[name="title"]').val();
			var autor = $('[name="autor"]').val();
			var category_one = $('[name="category_one"]').val();
			var category_two = $('[name="category_two"]').val();
			var description_small = $('[name="description-small"]').val();
			var description = $('[name="description"]').val(text);

			if(validate_img == true){
				if(title != "" && autor != "" && category_one != "" && category_two != "" && description_small != "" && text != ""){
								$('#data_publication').submit();
							}else{
								alert();
					}
			}else{
				alert();
			}

	  });
      </script>
  </body>
</html>
