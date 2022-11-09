<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/form.css" />
    <title>formulario</title>
</head>
<h1> FORMULARIO ACTUALIZAR DATOS PRODUCTOS </h1>

<body>
    <section class="form-register">
        <input class="controls" type="int" name="code" id="code" placeholder="codigo">
        <input class="controls" type="float" name="price" id="price" placeholder="precio">
        <input class="controls" type="text" name="Description" id="Description" placeholder="descripción">
        <input class="controls" type="id" name="product" id="product" placeholder="tipo de producto">
        <input class="botons" type="submit" value="Actualizar">
    </section>

</body>

</html>