<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/global.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/header.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/cart.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Carrito</title>
</head>

<body>
  <?php include_once 'views/header.php' ?>

  <main class="cart-main">
    <div>
      <div class="cart-produt">
        <div class="cart-product-img-container">
          <img src="" alt="">
        </div>
        <div class="cart-product-details">
          <p>Nombre producto</p>
          <p>Precio</p>
          <p>Cantidad</p>
        </div>
        <div class="cart-product-btns-container">
          <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 7h16" />
              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
              <path d="M10 12l4 4m0 -4l-4 4" />
            </svg>
          </a>
        </div>
      </div>
      <div class="cart-details-container">
        <div class="cart-details">
          <p>Precio Total: $456789</p>
        </div>
        <div class="cart-details-btn">
          <a href="" class="btn-orange">Comprar</a>
          <a href="" class="btn-red">Vacear Carrito</a>
        </div>
      </div>
    </div>
  </main>

</body>

</html>