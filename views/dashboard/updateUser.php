<section class="form-dashboard-container">
  <h1 class="form-title"> Actualizar Usuario </h1>
  <form action="<?php echo constant('URL') ?>dashboard/updateUser" method="POST" class="form-dashboard">
    <input type="text" name="id" id="id" value="<?php echo $data['id'] ?>" hidden>
    <div class="input-container">
      <label for="">Nombre</label>
      <input type="text" name="name" id="name" value="<?php echo $data['name'] ?>">
    </div>
    <div class="input-container">
      <label for="">Correo Electronico</label>
      <input type="email" name="email" id="email" value="<?php echo $data['email'] ?>">
    </div>
    <div class="input-container">
      <label for="">Número de Celular</label>
      <input type="number" name="cellphone" id="cellphone" value="<?php echo $data['cellphone'] ?>">
    </div>
    <div class="input-container">
      <label for="">Dirección</label>
      <input type="text" name="address" id="address" value="<?php echo $data['address'] ?>">
    </div>
    <div class="btn-container">
      <input type="submit" value="Actualizar Usuario">
    </div>
  </form>
</section>