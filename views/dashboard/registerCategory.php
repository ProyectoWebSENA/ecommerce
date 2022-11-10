<section class="form-dashboard-container">
  <h1 class="form-title"> Nueva Categoria </h1>
  <form action="<?php echo constant('URL') ?>dashboard/registerCategory" method="POST" class="form-dashboard">
    <div class="input-container">
      <label for="">Codigo de categoria</label>
      <input type="number" name="cat_code" id="cat_code" placeholder="codigo">
    </div>
    <div class="input-container">
      <label for="">Nombre</label>
      <input type="text" name="name" id="name" placeholder="nombre">
    </div>
    <div class="btn-container">
      <input type="submit" value="Crear Categoria">
    </div>
  </form>
</section>