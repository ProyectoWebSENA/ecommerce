<section class="auth-form-section">
  <form action="<?php echo constant('URL') ?>dashboard/updateUser" method="POST" class="auth-form">
    <h1 class="auth-form-title">Registrarse</h1>
    <input type="hidden" name="id" id="id" required value="<?php echo $dataForTheTable->getId(); ?>" />

    <div class="auth-input-container">
      <label for="">Nombre completo</label>
      <input type="text" name="name" id="name" required value="<?php echo $dataForTheTable->getName(); ?>" />
    </div>
    <div class="auth-input-container">
      <label for="">Correo Electronico</label>
      <input type="email" name="email" id="email" required value="<?php echo $dataForTheTable->getEmail(); ?>" />
    </div>
    <div class="auth-input-container">
      <label for="">Numero de celular</label>
      <input type="number" name="cellphone" id="cellphone" required value="<?php echo $dataForTheTable->getCellphone(); ?>" />
    </div>
    <div class="auth-input-container">
      <label for="">Dirección</label>
      <input type="text" name="address" id="address" required value="<?php echo $dataForTheTable->getAddress() ?>" />
    </div>
    <div class="auth-submit-container">
      <input type="submit" value="Modificar" class="submit-btn" />
    </div>
  </form>
</section>