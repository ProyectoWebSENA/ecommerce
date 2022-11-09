<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styles1.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="#">
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

        </div>
    </section>

    <section>
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

            <div class="row">
                <div class="cell" data-title="Id">1</div>
                <div class="cell" data-title="Nombre">Nombre</div>
                <div class="cell" data-title="Correo Electronico">example@example.com</div>
                <div class="cell" data-title="# Celular">1567890</div>
                <div class="cell" data-title="Direccion">Direccion</div>
                <div class="cell" data-title="Actualizar">
                    <a href="" class="table-btn">Actualizar</a>
                </div>
                <div class="cell" data-title="Eliminar">
                    <a href="" class="table-btn">Eliminar</a>
                </div>
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