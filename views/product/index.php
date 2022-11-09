<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/global.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/header.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/home.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/product.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Productos</title>
</head>

<body>
<?php include_once 'views/header.php' ?>
<section class="columns-container">
        <div class="products_columns">
        <img src="<?php echo constant('URL') ?>public/images/product.jpg">
            <div class="text_products">
            <p>Existencias</p>
            <p>Precio del producto</p>
            </div>
        </div>

        <div class="products_columns">
            <p>Descripcion del producto</p>
        </div>
    </section>

</body>
<footer>
    <div class="products_review">
        <P>Categoria del producto</P>
        <p>Nombre del usuario</p>
        <img src="<?php echo constant('URL') ?>public/images/usuary.png">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque praesentium voluptas sed eius corrupti, qui culpa iure exercitationem minus perferendis.</p>
        <div>
</html>