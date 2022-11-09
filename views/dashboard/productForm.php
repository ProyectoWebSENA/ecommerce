<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/form.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Nuevo Producto | Ecommerce</title>
</head>

<body>
  <h1> Nuevo Producto </h1>
  <section class="form-register">
    <form action="<?php echo constant('URL') ?>dashboard/registerProduct" method="POST">
      <input class="controls" type="number" name="code" id="code" placeholder="codigo">
      <input class="controls" type="number" name="price" id="price" placeholder="precio">
      <input class="controls" type="text" name="Description" id="Description" placeholder="descripción">
      <input class="controls" type="" name="name" id="name" placeholder="url-img">
      <input class="controls" type="id" name="product" id="product" placeholder="tipo de producto">
      <input class="botons" type="submit" value="Agregar Producto">
    </form>
  </section>

</body>

</html>