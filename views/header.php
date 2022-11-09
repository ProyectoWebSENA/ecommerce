<?php
$sessiom = new Session();
?>

<header class="header">
  <nav class="navbar">
    <div class="trademark-container">
      <a href="" class="trademark">
        <img src="<?php echo constant('URL') ?>public/images/logo.jpg" alt="">
      </a>
    </div>
    <div class="navbar-actions-container" id="nav-actions-container">
      <div class="search-container">
        <form action="#" method="get" class="search-form">
          <input type="text" name="" id="" placeholder="Busca productos aquí">
          <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="10" cy="10" r="7" />
              <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
          </button>
        </form>
      </div>
      <div class="links-container">
        <div href="" class="profile-icon" id="profile-action">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <circle cx="12" cy="7" r="4" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
          </svg>
          <p>
            <?php
            if (isset($_SESSION['user']) && isset($_SESSION['username'])) {
              echo $_SESSION['username'];
            } else {
              echo "Nombre";
            }
            ?>
          </p>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fold-down" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round" id="arrow-down">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 11v8l3 -3m-6 0l3 3" />
            <line x1="9" y1="7" x2="10" y2="7" />
            <line x1="14" y1="7" x2="15" y2="7" />
            <line x1="19" y1="7" x2="20" y2="7" />
            <line x1="4" y1="7" x2="5" y2="7" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fold-up hidden" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round" id="arrow-up">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 13v-8l-3 3m6 0l-3 -3" />
            <line x1="9" y1="17" x2="10" y2="17" />
            <line x1="14" y1="17" x2="15" y2="17" />
            <line x1="19" y1="17" x2="20" y2="17" />
            <line x1="4" y1="17" x2="5" y2="17" />
          </svg>
        </div>
        <div class="mobile-profile-icon-actions-container" id="mobile-profile-action-links">
          <?php
          if (isset($_SESSION['user'])) {
            echo '
                <a href="/ecommerce/account">Ajustes de Cuenta</a>
                <a href="/ecommerce/logout">Cerrar Sesión</a>
              ';
          } else {
            echo '
                <a href="/ecommerce/login">Iniciar Sesión</a>
              ';
          }
          ?>
        </div>
        <?php
        if (isset($_SESSION['role'])) {
          if ($_SESSION['role'] == 'user') {
            echo '
              <a href="/ecommerce/cart" class="cart-icon ">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <circle cx="6" cy="19" r="2" />
                  <circle cx="17" cy="19" r="2" />
                  <path d="M17 17h-11v-14h-2" />
                  <path d="M6 5l14 1l-1 7h-13" />
                </svg>
                <p>Tu Carrito</p>
                <div class="span-div"></div>
              </a>';
          } else if ($_SESSION['role'] == 'admin') {
            echo '
              <a href="/ecommerce/dashboard" class="cart-icon ">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <line x1="3" y1="21" x2="21" y2="21" />
                  <line x1="9" y1="8" x2="10" y2="8" />
                  <line x1="9" y1="12" x2="10" y2="12" />
                  <line x1="9" y1="16" x2="10" y2="16" />
                  <line x1="14" y1="8" x2="15" y2="8" />
                  <line x1="14" y1="12" x2="15" y2="12" />
                  <line x1="14" y1="16" x2="15" y2="16" />
                  <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                </svg>
                <p>Dashboard</p>
                <div class="span-div"></div>
              </a>';
          }
        }
        ?>
      </div>
    </div>
    <div class="desktop-profile-icon-actions-container" id="desktop-profile-action-links">
      <?php
      if (isset($_SESSION['user'])) {
        echo '
                <a href="/ecommerce/account">Ajustes de Cuenta</a>
                <a href="/ecommerce/logout">Cerrar Sesión</a>
              ';
      } else {
        echo '
                <a href="/ecommerce/login">Iniciar Sesión</a>
              ';
      }
      ?>
    </div>
    <div class="burger" id="burger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
  </nav>
</header>

<script src="<?php echo constant('URL') ?>public/javascript/navbar.js"></script>