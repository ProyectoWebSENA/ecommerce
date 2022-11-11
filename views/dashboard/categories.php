<div class="table-container">
  <div class="table">
    <div class="row header">
      <div class="cell">Còdigo categorìa</div>
      <div class="cell">Nombre</div>
      <div class="cell">Actualizar</div>
      <div class="cell">Eliminar</div>
    </div>
    <?php foreach ($dataForTheTable as $data) : ?>
      <div class="row">
        <div class="cell" data-title="Còdigo categorìa"><?php echo $data['cat_code']; ?></div>
        <div class="cell" data-title="Nombre"><?php echo $data['name']; ?></div>
        <div class="cell" data-title="Actualizar">
          <a href="<?php echo constant('URL') . "dashboard/viewUpdateCategory/?cat_code=" . $data['cat_code'] ?>" class="table-btn btn-orange">Actualizar</a>
        </div>
        <div class="cell" data-title="Eliminar">
          <a href="<?php echo constant('URL') . "dashboard/deleteCategory/?cat_code=" . $data['cat_code'] ?>" class="table-btn btn-red">Eliminar</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>