<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/global.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/404.css" />
  <title>Pagina No Encontrada | Ecommerce</title>
</head>

<body>
  <main class="main">
    <a href="<?php echo constant('URL') ?>" class="pnf-icon-container">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="60" height="60" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <polyline points="5 12 3 12 12 3 21 12 19 12" />
        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
      </svg>
      <a />
      <div class="pnf-desc-container">
        <div class="pnf-img-container">
          <img src="<?php echo constant('URL') ?>public/images/404.svg" alt="404 illustration" class="pnf-img" />
        </div>
        <div class="pnf-text-container">
          <p class="pnf-text">
            ¡Oops! Parece que la pagina que estás buscando no existe. Regresa a
            la pagina principal haciendo <a href="<?php echo constant('URL') ?>" class="pnf-home-link">click aquí</a>.
          </p>
        </div>
      </div>
  </main>
</body>

</html>