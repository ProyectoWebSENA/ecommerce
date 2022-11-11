<section class="form-dashboard-container">
  <h1 class="form-title"> Actualizar Categoria </h1>
  <form action="<?php echo constant('URL') ?>dashboard/updateCategory" method="POST" class="form-dashboard">
    <input type="text" name="cat_code" id="cat_code" value="<?php echo $dataForTheTable->getCatCode(); ?>" hidden>
    <div class="input-container">
      <label for="name">Nombre</label>
      <input type="text" name="name" id="name" value="<?php echo $dataForTheTable->getName(); ?>">
    </div>
    <div class="btn-container">
      <input type="submit" value="Actualizar Categoria">
    </div>
  </form>
</section>