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
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/product.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title><?php echo $data['product']['name'] ?> | Ecommerce</title>
</head>

<body>
  <?php include_once 'views/header.php' ?>

  <div id="modal-container">
    <div class="modal">
      <div id="close-modal-btn">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </div>
      <p class="modal-title">Dejanos saber lo que piensas sobre este producto.</p>
      <div class="review-form-container">
        <form action="<?php echo constant('URL') ?>review/create" method="POST" class="review-form">
          <input type="text" name="prod_code" value="<?php echo $data['product']['prod_code'] ?>" hidden>
          <input type="text" name="user_id" value="<?php echo $_SESSION['user'] ?>" hidden>
          <div class="input-container">
            <label for="">Calificación:</label>
            <div class="stepper">
              <div id="decrement" onclick="modalStepper(this)" class="q-btn"> - </div>
              <input type="number" min="1" max="5" step="1" name="rating" value="1" id="modal-input" readonly>
              <div id="increment" onclick="modalStepper(this)" class="q-btn"> + </div>
            </div>
          </div>
          <div class="input-container">
            <label for="review">Reseña</label>
            <textarea name="review" id=""></textarea>
          </div>
          <div class="btn-container">
            <input type="submit" value="Enviar Reseña">
          </div>
        </form>
      </div>
    </div>
  </div>

  <main class="product-container">
    <div class="product-image-container">
      <img src="<?php echo constant('URL') ?>public/images/<?php echo $data['product']['prod_pic_url'] ?>" alt="">
    </div>
    <div class="product-details-container">
      <div class="details">
        <h1 class="product-name"><?php echo $data['product']['name'] ?></h1>
        <p class="product-price">$<?php echo $data['product']['price'] ?></p>
        <p class="product-units"><?php echo $data['product']['stock'] ?> Unidades Disponibles</p>
        <div class="product-details">
          <p class="product-details-title">Descripción</p>
          <p class="product-details-text"><?php echo $data['product']['description'] ?></p>
        </div>
      </div>
      <?php if ($data['product']['stock'] !== 0) : ?>
        <div class="cart-form-container">
          <form action="<?php echo constant('URL') ?>cart/add" method="POST" class="cart-form">
            <input type="text" name="prod_code" value="<?php echo $data['product']['prod_code'] ?>" hidden>
            <div class="stepper">
              <div id="decrement" onclick="stepper(this)" class="q-btn"> - </div>
              <input type="number" min="1" name="prod_quantity" max="<?php echo $data['product']['stock'] ?>" step="1" value="1" id="my-input" readonly>
              <div id="increment" onclick="stepper(this)" class="q-btn"> + </div>
            </div>
            <div class="btn-container">
              <input type="submit" value="Agregar Al Carrito">
            </div>
          </form>
        </div>
      <?php endif ?>
      <?php if ($data['product']['stock'] === 0) : ?>
        <div class="stock-notice-container">
          <p>Este producto no tiene existencias en este momento.</p>
        </div>
      <?php endif ?>
    </div>
  </main>

  <section class="reviews-section">
    <div>
      <div class="review-btn-container">
        <?php
        if (isset($_SESSION['user'])) {
          echo '<div id="new-review-btn">Crear Reseña</div>';
        } else {
          echo '<a href="/ecommerce/login">Crear Reseña</a>';
        }
        ?>
      </div>
      <?php if (count($data['reviews']) === 0) : ?>
        <div class="review-notice">
          <p>Se el primero en compartir tu opinión con el resto de nuestros usuarios.</p>
          <div class="review-icon-notice-container">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
              <line x1="12" y1="12" x2="12" y2="12.01" />
              <line x1="8" y1="12" x2="8" y2="12.01" />
              <line x1="16" y1="12" x2="16" y2="12.01" />
            </svg>
          </div>
        </div>
      <?php endif ?>
      <?php foreach ($data['reviews'] as $reviews) : ?>
        <div class="review-container">
          <div class="review-user-rating">
            <?php for ($i = 0; $i < $reviews['stars']; $i++) {
              echo '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="44" height="44" viewBox="0 0 24 24" stroke-width="3" stroke="#ffec00" fill="#ffec00" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
              </svg>';
            } ?>
          </div>
          <p class="review-user-name">Nombre Usuario</p>
          <p class="review-details"><?php echo $reviews['comment'] ?></p>
        </div>
      <?php endforeach ?>
    </div>
  </section>

  <script src="<?php echo constant('URL') ?>public/javascript/numberInput.js"></script>
  <script>
    const modal = document.getElementById('modal-container');
    const closeBtn = document.getElementById('close-modal-btn');
    const openBtn = document.getElementById('new-review-btn');

    openBtn.addEventListener('click', () => {
      modal.classList.add('active');
    })
    closeBtn.addEventListener('click', () => {
      modal.classList.remove('active');
    })
  </script>
</body>

</html>