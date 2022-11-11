<div class="table-container">
  <div class="table">
    <div class="row header">
      <div class="cell">ID</div>
      <div class="cell">Nombre</div>
      <div class="cell">Correo Electronico</div>
      <div class="cell"># Celular</div>
      <div class="cell">Direccion</div>
      <div class="cell">Actualizar</div>
      <div class="cell">Eliminar</div>
    </div>
    <?php foreach ($dataForTheTable as $data) : ?>
      <div class="row">
        <div class="cell" data-title="Id"><?php echo $data['id']; ?></div>
        <div class="cell" data-title="Nombre"><?php echo $data['name']; ?></div>
        <div class="cell" data-title="Correo Electronico"><?php echo $data['email']; ?></div>
        <div class="cell" data-title="# Celular"><?php echo $data['cellphone']; ?></div>
        <div class="cell" data-title="Direccion"><?php echo $data['address']; ?></div>
        <div class="cell" data-title="Actualizar">
          <a href="<?php echo constant('URL') . "dashboard/searchUser/?id=" . $data['id'] ?>" class="table-btn btn-orange">Actualizar</a>
        </div>
        <div class="cell" data-title="Eliminar">
          <a href="<?php echo constant('URL') . "dashboard/deleteUser/?id=" . $data['id'] ?>" class="table-btn btn-red">Eliminar</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>