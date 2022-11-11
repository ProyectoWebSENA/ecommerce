<?php
$data = $this->data;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/global.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/header.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/account.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/forms.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Ajustes de tu cuenta | Ecommerce</title>
</head>

<body>
  <?php include_once 'views/header.php'; ?>
  <main class="form-account-container">
    <h1 class="form-title"> Tus Datos </h1>
    <form action="<?php echo constant('URL') ?>account/updateUserData" method="POST" class="form-account">
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
      <div class="input-title-container">
        <p>Cambiar Contraseña</p>
      </div>
      <div class="input-container">
        <label for="">Nueva Contraseña</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="input-container">
        <label for="">Confirmar Contraseña</label>
        <input type="password" name="coPassword" id="coPassword">
      </div>
      <div class="btn-container">
        <input type="submit" value="Guardar Cambios">
      </div>
    </form>
  </main>
</body>

</html>