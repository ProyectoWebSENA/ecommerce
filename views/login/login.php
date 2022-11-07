<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?> public/styles/global.css" />
  <link rel="stylesheet" href="./styles/auth.css" />
  <title>Iniciar Sesión | Ecommerce</title>
</head>

<body>
  <header>
    <nav class="auth-nav">
      <div class="auth-trademark-container">
        <a href="/" class="auth-trademark"><span>Ecommerce</span></a>
      </div>
    </nav>
  </header>

  <main class="auth-main">
    <section class="auth-img-section">
      <div class="auth-img-container">
        <img src="https://picsum.photos/2000" alt="" class="auth-img" />
      </div>
    </section>
    <section class="auth-form-section">
      <form action="POST" class="auth-form">
        <h1 class="auth-form-title">Iniciar Sesión</h1>
        <div class="auth-input-container">
          <label for="">Correo Electronico</label>
          <input type="email" name="" id="" required />
        </div>
        <div class="auth-input-container">
          <label for="">Contraseña</label>
          <input type="password" name="" id="" required />
        </div>
        <div class="auth-submit-container">
          <input type="submit" value="Iniciar Sesión" class="submit-btn" />
        </div>
        <div class="auth-links-container">
          <a href="/">¿Olvidaste tu Contraseña?</a>
          <a href="/">Registrarse</a>
        </div>
      </form>
    </section>
  </main>
</body>

</html>