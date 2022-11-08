<?php

class CartController extends SessionController
{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $this->view->render('login/index');
  }

  function addProductToCart()
  {
    if (!$this->validateCartStatus()) {
      $this->createUserCart();
    } else {
      if ($this->searchProductInCart()) {
        $this->updateProductFromCart();
      } else {
        $this->saveCartDetail();
      }
      $this->updateTheTotal();
    }
  }

  private function validateCartStatus()
  {
    if ($this->existsPOST(['id_user'])) {
      $idUser = $this->getPost('id_user');

      if ($idUser == '' || empty($idUser)) {
        error_log("CARTCONTROLLER::VALIDATECARTSTATUS empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
      }
      return  $this->model->validateCartStatus($idUser);
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  private function createUserCart()
  {
    if ($this->existsPOST(['id_user'])) {
      $idUser = $this->getPost('id_user');

      if ($idUser == '' || empty($idUser)) {
        error_log("CARTCONTROLLER::VALIDATECARTSTATUS empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      return  $this->model->createUserCart($idUser);
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  private function searchProductInCart()
  {
    if ($this->existsPOST(['id_prod'])) {
      $idProd = $this->getPost('id_prod');

      if ($idProd == '' || empty($idProd)) {
        error_log("CARTCONTROLLER::SEARCHPRODUCTINCART empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }
      return  $this->model->searchProductInCart($idProd);
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  private function saveCartDetail()
  {
    if ($this->existsPOST(['id_cart', 'id_prod', 'prod_quantity'])) {
      $idCart = $this->getPost('id_cart');
      $idProd = $this->getPost('id_prod');
      $prodQuantity = $this->getPost('prod_quantity');

      if ($idCart == '' || empty($idCart) || $idProd == '' || empty($idProd) || $prodQuantity == '' || empty($prodQuantity)) {
        error_log("CARTCONTROLLER::SAVECARTDETAIL empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->saveCartDetail($idProd)) {
        $this->redirect('', ['success' => "Producto agregado"]);
      } else {
        $this->redirect('cart', ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  private function updateTheTotal()
  {
    if ($this->existsPOST(['id_cart', 'total_price'])) {
      $idCart = $this->getPost('id_cart');
      $totalPrice = $this->getPost('total_price');

      if ($idCart == '' || empty($idCart) || $totalPrice == '' || empty($totalPrice)) {
        error_log("CARTCONTROLLER::UPDATETHETOTAL empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->updateTheTotal($idCart, $totalPrice)) {
        $this->redirect('', ['success' => "Total actualizado"]);
      } else {
        $this->redirect('cart', ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function getCartInformation()
  {
    if ($this->existsPOST(['id_user'])) {
      $idUser = $this->getPost('id_user');

      if ($idUser == '' || empty($idUser)) {
        error_log("CARTCONTROLLER::GETCARTINFORMATION empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->getCartInformation($idUser)) {
        $this->redirect('', ['success' => "Carrito encontrado exitosamente"]);
        return $this->model;
      } else {
        $this->redirect('cart', ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function deleteProductFromCart()
  {
    if ($this->existsPOST(['id_cart', 'id_prod'])) {
      $idCart = $this->getPost('id_cart');
      $idProd = $this->getPost('id_prod');

      if ($idCart == '' || empty($idCart) || $idProd == '' || empty($idProd)) {
        error_log("CARTCONTROLLER::DELETEPRODUCTFROMCART empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->deleteProductFromCart($idCart, $idProd)) {
        $this->redirect('', ['success' => "Producto eliminado exitosamente"]);
      } else {
        $this->redirect('cart', ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function deleteCartInformation()
  {
    if ($this->existsPOST(['id_cart'])) {
      $idCart = $this->getPost('id_cart');

      if ($idCart == '' || empty($idCart)) {
        error_log("CARTCONTROLLER::DELETECARTINFORMATION empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->deleteCartInformation($idCart)) {
        $this->redirect('', ['success' => "Carrito limpiado"]);
      } else {
        $this->redirect('cart', ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function updateProductFromCart()
  {
    if ($this->existsPOST(['id_cart', 'id_prod', 'prod_quantity'])) {
      $idCart = $this->getPost('id_cart');
      $idProd = $this->getPost('id_prod');
      $prodQuantity = $this->getPost('prod_quantity');

      if ($idCart == '' || empty($idCart) || $idProd == '' || empty($idProd) || $prodQuantity == '' || empty($prodQuantity)) {
        error_log("CARTCONTROLLER::UPDATEPRODUCTFROMCART empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->updateProductFromCart($idCart, $idProd, $prodQuantity)) {
        $this->redirect('', ['success' => "Cantidad modificada"]);
      } else {
        $this->redirect('cart', ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }
}
