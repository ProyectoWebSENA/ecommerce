<?php
$data = $this->data;
?>
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
  <title>Tu Carrito | Ecommerce</title>
</head>

<body>
  <?php include_once 'views/header.php' ?>

  <main class="cart-main">
    <h1 class="page-title">Tu Carrito</h1>
    <div>
      <?php if (count($data['products']) === 0) : ?>
        <div class="cart-notice">
          <p>Parece que no tienes productos en tu carrito. Explora nuestros productos y añade algunos.</p>
          <div class="cart-notice-icon-container">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="150" height="150" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="6" cy="19" r="2" />
              <circle cx="17" cy="19" r="2" />
              <path d="M17 17h-11v-14h-2" />
              <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13" />
              <path d="M15 6h6m-3 -3v6" />
            </svg>
          </div>
        </div>
      <?php endif ?>
      <?php if (count($data['products']) !== 0) : ?>
        <?php foreach ($data['products'] as $product) : ?>
          <div class="cart-product">
            <div class="cart-product-img-container">
              <img src="<?php echo constant('URL') ?>public/images/products/<?php echo $product['prod_pic_url'] ?>" alt="">
            </div>
            <div class="cart-product-details">
              <p><?php echo $product['name'] ?></p>
              <p>Cantidad: <?php echo $product['prod_quantity'] ?></p>
              <p>$<?php echo $product['price'] ?></p>
              <p>Total: $<?php
                          $total = $product['price'] * $product['prod_quantity'];
                          echo $total;
                          ?>
              </p>
            </div>
            <div class="cart-product-btns-container">
              <a href="<?php echo constant('URL') ?>cart/delete?id_cart=<?php echo $product['id'] ?>&id_prod=<?php echo $product['prod_code1'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 7h16" />
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                  <path d="M10 12l4 4m0 -4l-4 4" />
                </svg>
              </a>
            </div>
          </div>
        <?php endforeach ?>
        <div class="cart-details-container">
          <div class="cart-details">
            <p>Precio Total: $<?php echo $data['totalPrice']['total_price'] ?></p>
          </div>
          <div class="cart-details-btn">
            <a href="" class="btn-orange">Comprar</a>
            <a href="" class="btn-red">Vacear Carrito</a>
          </div>
        </div>
      <?php endif ?>
    </div>
  </main>
</body>

</html>