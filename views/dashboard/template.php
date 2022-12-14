<?php
$dataForTheTable = $this->data;
$link = trim("$_SERVER[REQUEST_URI]");
$url = explode('/', $link);
$activate1 = "";
$activate2 = "";
$activate3 = "";
if ($url[3] === "searchAllUser") {
  $view = "users";
  $activate1 = "active";
} else if ($url[3] === "searchAllCategories") {
  $view = "categories";
  $activate2 = "active";
} elseif ($url[3] === "searchAllProducts") {
  $view = "products";
  $activate3 = "active";
} elseif ($url[3] === "searchUser") {
  $view = "updateUser";
} elseif ($url[3] === "viewRegisterProduct") {
  $view = "productForm";
} elseif ($url[3] === "viewUpdateProduct") {
  $view = "updateProduct";
} elseif ($url[3] === "viewRegisterCategory") {
  $view = "registerCategory";
} elseif ($url[3] === "viewUpdateCategory") {
  $view = "updateCategory";
}
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
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/styles/forms.css" />
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/images/logo.jpg" type="image/x-icon">
  <title>Dashboard Administrador | Ecommerce</title>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Ecommerce</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="<?php echo constant('URL') ?>dashboard/searchAllUser" class="<?php echo $activate1 ?>">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Usuarios</span>
        </a>
      </li>
      <li>
        <a href="<?php echo constant('URL') ?>dashboard/searchAllCategories" class="<?php echo $activate2 ?>">
          <i class='bx bx-box'></i>
          <span class="links_name">Categorias</span>
        </a>
      </li>
      <li>
        <a href="<?php echo constant('URL') ?>dashboard/viewRegisterCategory" class="<?php echo $activate2 ?>">
          <i class='bx bx-list-plus'></i>
          <span class="links_name">Crear categoria</span>
        </a>
      </li>
      <li>
        <a href="<?php echo constant('URL') ?>dashboard/searchAllProducts" class="<?php echo $activate3 ?>">
          <i class='bx bxl-product-hunt'></i>
          <span class="links_name">Productos</span>
        </a>
      </li>
      <li>
        <a href="<?php echo constant('URL') ?>dashboard/viewRegisterProduct" class="<?php echo $activate3 ?>">
          <i class='bx bx-list-plus'></i>
          <span class="links_name">Crear producto</span>
        </a>
      </li>
      <li class="log_out">
        <a href="/ecommerce/logout">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Cerrar sesi??n</span>
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
    </nav>

    <?php
    if (isset($view) && !empty($view)) {
      include_once($view . ".php");
    } else {
    ?>
      <p>index</p>
    <?php
    }
    ?>

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