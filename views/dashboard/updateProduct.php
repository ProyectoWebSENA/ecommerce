<section class="form-dashboard-container">
  <h1 class="form-title"> Modificar Producto </h1>
  <form action="<?php echo constant('URL') ?>dashboard/updateProduct" method="POST" enctype="multipart/form-data" class="form-dashboard">
    <input type="number" name="prod_code" id="prod_code" value="<?php echo $dataForTheTable['products']['prod_code'] ?>" hidden>
    <div class="input-container">
      <label for="">Nombre</label>
      <input type="text" name="name" id="name" value="<?php echo $dataForTheTable['products']['name'] ?>">
    </div>
    <div class="input-container">
      <label for="">Precio</label>
      <input type="number" name="price" id="price" value="<?php echo $dataForTheTable['products']['price'] ?>">
    </div>
    <div class="input-container">
      <label for="">Descripción</label>
      <textarea name="description" id="description" value=""><?php echo $dataForTheTable['products']['description'] ?></textarea>
    </div>
    <div class="input-container">
      <label for="">Categoria</label>
      <select name="cat_code" id="cat_code">
        <?php foreach ($data['categories'] as $category) : ?>
          <option value="<?php echo $category['cat_code'] ?>"><?php echo $category['name'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="input-container">
      <label for="">Stock</label>
      <input type="text" name="stock" id="stock" value="<?php echo $dataForTheTable['stock'] ?>">
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