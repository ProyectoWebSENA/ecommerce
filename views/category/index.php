<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/global.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/header.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/category.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Categoria | Ecommerce</title>
</head>

<body>
  <?php include_once 'views/header.php' ?>

  <h1 class="page-title">Sección Categoria</h1>

  <section class="section">

    <h2 class="cards-container-title">Productos en: Categoria</h2>

    <div class="cards-container">

      <div class="card">
        <figure class="card-img-container ">
          <img src="<?php echo constant('URL') ?>public/images/gorra1.jpg">
        </figure>
        <div class="card-desc-container">
          <h3>Gorra roja</h3>
          <p>$100000</p>
          <a href="#">ver mas</a>
        </div>
      </div>

    </div>
  </section>
</body>

</html>