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
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/home.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Pagina Principal</title>
</head>

<body>
  <?php include_once 'views/header.php'; ?>
  <h1 class="page-title">¡Encuentra productos que de verdad necesitas!</h1>
  <?php foreach ($data['categories'] as $categorias) : ?>
    <?php
    $count = 0;
    foreach ($data['products'] as $products) {
      if ($categorias['cat_code'] == $products['cat_code1']) {
        $count = $count + 1;
      }
    }
    if ($count > 0) :
    ?>
      <section class="section">
        <h2 class="cards-container-title"><?php echo $categorias['name'] ?></h2>
        <div class="cards-container">
          <?php foreach ($data['products'] as $products) : ?>
            <?php if ($categorias['cat_code'] == $products['cat_code1']) : ?>
              <div class="card">
                <figure class="card-img-container ">
                  <img src="<?php echo constant('URL') ?>public/images/<?php echo $products['prod_pic_url'] ?>">
                </figure>
                <div class="card-desc-container">
                  <h3><?php echo $products['name'] ?></h3>
                  <p>$<?php echo $products['price'] ?></p>
                  <a href="<?php echo constant('URL') ?>product?id=<?php echo $products['prod_code'] ?>">Ver Producto</a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </section>
    <?php endif ?>
  <?php endforeach ?>
</body>

</html>