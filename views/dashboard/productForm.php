<section class="form-dashboard-container">
  <h1 class="form-title"> Nuevo Producto </h1>
  <form action="<?php echo constant('URL') ?>dashboard/registerProduct" method="POST" class="form-dashboard">
    <div class="input-container">
      <label for="">Codigo de producto</label>
      <input type="number" name="prod_code" id="prod_code">
    </div>
    <div class="input-container">
      <label for="">Nombre</label>
      <input type="text" name="name" id="name">
    </div>
    <div class="input-container">
      <label for="">Precio</label>
      <input type="number" name="price" id="price">
    </div>
    <div class="input-container">
      <label for="">Descripción</label>
      <input type="text" name="description" id="description">
    </div>
    <div class="input-container">
      <label for="">Stock</label>
      <input type="text" name="stock" id="stock">
    </div>
    <div class="input-container">
      <label for="">Imagen</label>
      <input class="form-control" type="file" name="image" value="" />
    </div>
    <div class="btn-container">
      <input class="botons" type="submit" value="Agregar Producto">
    </div>
  </form>
</section>