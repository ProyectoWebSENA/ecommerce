<?php
$users = $this->data;
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
  <link rel="stylesheet" href="styles1.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/global.css" />
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/dashboard.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Ecommerce</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Usuarios</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-box'></i>
          <span class="links_name">Categorias</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Productos</span>
        </a>
      </li>

      <li class="log_out">
        <a href="/ecommerce/logout">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Cerrar sesión</span>
        </a>
      </li>
    </ul>
  </div>



  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Administrador</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
      </div>
    </nav>

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
        <?php foreach ($users as $user) : ?>
          <div class="row">
            <div class="cell" data-title="Id"><?php echo $user['id']; ?></div>
            <div class="cell" data-title="Nombre"><?php echo $user['name']; ?></div>
            <div class="cell" data-title="Correo Electronico"><?php echo $user['email']; ?></div>
            <div class="cell" data-title="# Celular"><?php echo $user['cellphone']; ?></div>
            <div class="cell" data-title="Direccion"><?php echo $user['address']; ?></div>
            <div class="cell" data-title="Actualizar">
              <a href="" class="table-btn">Actualizar</a>
            </div>
            <div class="cell" data-title="Eliminar">
              <a href="" class="table-btn">Eliminar</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>

</html>