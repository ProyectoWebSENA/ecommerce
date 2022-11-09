<!-- <!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/form.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Nuevo Producto | Ecommerce</title>
</head> -->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<body>
  <h1> Nuevo Producto </h1>
  <section class="form-register">
    <form action="<?php echo constant('URL') ?>dashboard/registerProduct" method="POST">
      <input class="controls" type="number" name="prod_code" id="prod_code" placeholder="codigo">
      <input class="controls" type="text" name="name" id="name" placeholder="nombre">
      <input class="controls" type="number" name="price" id="price" placeholder="precio">
      <input class="controls" type="text" name="description" id="description" placeholder="descripción">
      <input class="controls" type="text" name="prod_pic_url" id="prod_pic_url" placeholder="url-img">
      <input class="botons" type="submit" value="Agregar Producto">
    </form>
  </section>

</body>
<!-- 
</html> -->