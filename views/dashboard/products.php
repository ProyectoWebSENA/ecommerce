<div class="table-container">
  <div class="table">
    <div class="row header">
      <div class="cell">Codigo producto</div>
      <div class="cell">Nombre</div>
      <div class="cell">Precio</div>
      <div class="cell">Descripcion</div>
      <div class="cell">Stock</div>
      <div class="cell">URL imagen</div>
      <div class="cell">Actualizar</div>
      <div class="cell">Eliminar</div>
    </div>
    <?php foreach ($dataForTheTable as $data) : ?>
      <div class="row">
        <div class="cell" data-title="Codigo producto"><?php echo $data['prod_code']; ?></div>
        <div class="cell" data-title="Nombre"><?php echo $data['name']; ?></div>
        <div class="cell" data-title="Precio"><?php echo $data['price']; ?></div>
        <div class="cell" data-title="Descripcion"><?php echo $data['description']; ?></div>
        <div class="cell" data-title="Stock"><?php echo $data['stock']; ?></div>
        <div class="cell" data-title="URL imagen"><?php echo $data['prod_pic_url']; ?></div>
        <div class="cell" data-title="Actualizar">
          <a href="<?php echo constant('URL') . "dashboard/viewUpdateProduct/?prod_code=" . $data['prod_code'] ?>" class="table-btn btn-orange">Actualizar</a>
        </div>
        <div class="cell" data-title="Eliminar">
          <a href="<?php echo constant('URL') . "dashboard/deleteProduct/?prod_code=" . $data['prod_code'] ?>" class="table-btn btn-red">Eliminar</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>