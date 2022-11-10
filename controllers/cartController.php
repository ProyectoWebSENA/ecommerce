<?php

class CartController extends SessionController
{
  function __construct()
  {
    parent::__construct();
    $sessiom = new Session();
  }

  function render()
  {
    $data = [];
    $data['products'] = $this->getCartInformation();
    $data['totalPrice'] = $this->getTotalPrice();
    $this->view->render('cart/index', $data);
  }

  function add()
  {
    if (!$this->validateCartStatus()) {
      $this->createUserCart();
      $this->saveCartDetail();
    } else {
      if ($this->searchProductInCart()) {
        $this->updateProductFromCart();
      } else {
        $this->saveCartDetail();
      }
    }
  }

  function delete()
  {
    if ($this->validateCartStatus()) {
      $this->deleteProductFromCart();
    }
  }

  private function validateCartStatus()
  {
    if (isset($_SESSION['user'])) {
      $idUser = $_SESSION['user'];
      return  $this->model->validateCartStatus($idUser);
    } else {
      $this->redirect('login', ['error' => "No se ha iniciado sesion"]);
    }
  }

  private function createUserCart()
  {
    $idUser = $_SESSION['user'];
    return  $this->model->createUserCart($idUser);
  }

  private function searchProductInCart()
  {
    if ($this->existsPOST(['prod_code'])) {
      $idProd = $this->getPost('prod_code');

      if ($idProd == '' || empty($idProd)) {
        error_log("CARTCONTROLLER::SEARCHPRODUCTINCART empty");
        $this->redirect('product?id=' . $idProd, ['error' => 'Campos vacios']);
        return false;
      }
      return $this->model->searchProductInCart($idProd);
    } else {
      $this->redirect('', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function updateProductFromCart()
  {
    if ($this->existsPOST(['prod_code', 'prod_quantity'])) {
      $idProd = $this->getPost('prod_code');
      $prodQuantity = $this->getPost('prod_quantity');

      if ($idProd == '' || empty($idProd) || $prodQuantity == '' || empty($prodQuantity)) {
        error_log("CARTCONTROLLER::UPDATEPRODUCTFROMCART empty");
        $this->redirect('product?id=' . $idProd, ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->updateProductFromCart($idProd, $prodQuantity)) {
        $product = new ProductModel();
        $product->updateProductStock($idProd, $prodQuantity, true);
        $this->redirect('product?id=' . $idProd, ['success' => "Cantidad modificada"]);
      } else {
        $this->redirect('product?id=' . $idProd, ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  private function saveCartDetail()
  {
    if ($this->existsPOST(['prod_code', 'prod_quantity'])) {
      $idProd = $this->getPost('prod_code');
      $prodQuantity = $this->getPost('prod_quantity');

      if ($idProd == '' || empty($idProd) || $prodQuantity == '' || empty($prodQuantity)) {
        error_log("CARTCONTROLLER::SAVECARTDETAIL empty");
        $this->redirect('product?id=' . $idProd, ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->saveCartDetail($idProd, $prodQuantity)) {
        $product = new ProductModel();
        $product->updateProductStock($idProd, $prodQuantity, true);
        $this->redirect('product?id=' . $idProd, ['success' => "Producto agregado"]);
      } else {
        $this->redirect('product?id=' . $idProd, ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function getCartInformation()
  {
    if (isset($_SESSION['user'])) {
      $idUser = $_SESSION['user'];

      if ($idUser == '' || empty($idUser)) {
        error_log("CARTCONTROLLER::GETCARTINFORMATION empty");
        $this->redirect('', ['error' => 'Campos vacios']);
        return false;
      }
      return $this->model->getCartInformation($idUser);
    } else {
      $this->redirect('cart', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function deleteProductFromCart()
  {
    if ($this->existsGET(['id_cart', 'id_prod'])) {
      $idCart = $this->getGet('id_cart');
      $idProd = $this->getGet('id_prod');

      if ($idCart == '' || empty($idCart) || $idProd == '' || empty($idProd)) {
        error_log("CARTCONTROLLER::DELETEPRODUCTFROMCART empty");
        $this->redirect('cart', ['error' => 'Campos vacios']);
        return false;
      }

      $quantity = $this->model->deleteProductFromCart($idCart, $idProd);
      $product = new ProductModel();
      $product->updateProductStock($idProd, $quantity, false);
      $this->redirect('cart', ['success' => "Producto eliminado"]);
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

  function getTotalPrice()
  {
    return $this->model->getTotalPrice($_SESSION['user']);
  }
}
