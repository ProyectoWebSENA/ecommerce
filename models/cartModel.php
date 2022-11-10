<?php

class CartModel extends Model
{
  private $idCart;

  public function __construct()
  {
    parent::__construct();
    $this->idCart = 0;
  }

  public function validateCartStatus($idUser)
  {
    try {
      $query = $this->prepare("SELECT id, id_user1 FROM cart WHERE id_user1 = :id_user1");
      $query->execute(['id_user1' => $idUser]);
      $result = $query->fetch(PDO::FETCH_ASSOC);
      if ($query->rowCount() > 0) {
        $this->idCart = $result['id'];
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log("CARTMODEL::VALIDATECARTSTATUS-> " . $e->getMessage());
      return false;
    }
  }

  public function createUserCart($idUser)
  {
    try {
      $query = $this->prepare("INSERT INTO cart (id_user1, total_price) VALUES (:id_user1, :total_price)");
      $query->execute(['id_user1' => $idUser, 'total_price' => 0]);
      $this->getCartId($idUser);
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::CREATEUSERCART-> " . $e->getMessage());
      return false;
    }
  }

  public function getCartInformation($idUser)
  {
    try {
      $query = $this->prepare("SELECT cart.id, user_cart.prod_code1 , user_cart.prod_quantity, products.name, products.price, products.prod_pic_url
      FROM cart
      INNER JOIN user_cart
      ON cart.id = user_cart.id_cart1
      INNER JOIN products
      ON user_cart.prod_code1 = products.prod_code
      WHERE cart.id_user1 = :id_user");
      $query->execute(['id_user' => $idUser]);
      $cart = $query->fetchAll(PDO::FETCH_ASSOC);
      return $cart;
    } catch (PDOException $e) {
      error_log("CARTMODEL::GETCARTINFORMATION -> " . $e->getMessage());
      return false;
    }
  }

  public function searchProductInCart($prodCode)
  {
    try {
      $query = $this->prepare("SELECT prod_code1 FROM user_cart WHERE id_cart1 = :id_cart1 AND prod_code1 = :prod_code1");
      $query->execute([
        'id_cart1' => $this->idCart,
        'prod_code1' => $prodCode
      ]);
      $query->fetch(PDO::FETCH_ASSOC);
      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log("CARTMODEL::SEARCHPRODUCTINCART -> " . $e->getMessage());
      return false;
    }
  }

  public function saveCartDetail($prodCode, $prodQuantity)
  {
    try {
      $query = $this->prepare("INSERT INTO user_cart ( id_cart1, prod_code1, prod_quantity) 
                              VALUES (:id_cart1,:prod_code1, :prod_quantity)");
      $query->execute([
        'id_cart1' => $this->idCart,
        'prod_code1' => $prodCode,
        'prod_quantity' => $prodQuantity
      ]);
      $this->updateTheTotal();
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::SAVECARTDETAIL-> " . $e->getMessage());
      return false;
    }
  }

  public function updateProductFromCart($prodCode, $prodQuantity)
  {
    $dbProdQuantity = $this->getCartProdQuantity($prodCode);
    $totalQuantity = $dbProdQuantity + $prodQuantity;
    try {
      $query = $this->prepare("UPDATE user_cart 
                SET  prod_quantity = :prod_quantity
                where id_cart1 = :id_cart1 and prod_code1 = :prod_code1");
      $query->execute([
        'prod_quantity' => $totalQuantity,
        'id_cart1' => $this->idCart,
        'prod_code1' => $prodCode
      ]);
      $this->updateTheTotal();
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::UPDATEPRODUCTFROMCART -> " . $e->getMessage());
      return false;
    }
  }

  public function deleteProductFromCart($idCart, $prodCode)
  {
    try {
      $dbProdQuantity = $this->getCartProdQuantity($prodCode);
      $query = $this->prepare("DELETE FROM user_cart 
                WHERE id_cart1 = :id_cart1 AND prod_code1 = :prod_code1 ");
      $query->execute([
        'id_cart1' => $idCart,
        'prod_code1' => $prodCode
      ]);
      $this->idCart = $idCart;
      $this->updateTheTotal();
      return $dbProdQuantity;
    } catch (PDOException $e) {
      error_log("CARTMODEL::DELETEPRODUCTFROMCART ->" . $e->getMessage());
      return false;
    }
  }

  public function updateTheTotal()
  {
    try {
      $totalPrice = 0;
      $products = $this->getCartProductInformation();
      foreach ($products as $product) {
        $totalPrice = $totalPrice + ($product['prod_quantity'] * $product['price']);
      }
      $query = $this->prepare("UPDATE cart SET total_price = :total_price
                WHERE id = :id");
      $query->execute([
        'total_price' => $totalPrice,
        'id' => $this->idCart
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::UPDATETHETOTAL-> " . $e->getMessage());
      return false;
    }
  }

  public function deleteCartInformation($idCart)
  {
    try {
      $query = $this->prepare("DELETE FROM user_cart
                WHERE id_cart1 = :id_cart1");
      $query->execute(['id_cart1' => $idCart]);
      return true;
    } catch (PDOException $e) {
      error_log("cartMODEL::DELETECARTINFORMATION ->" . $e->getMessage());
      return false;
    }
  }

  public function getCartId($idUser)
  {
    try {
      $query = $this->prepare("SELECT id FROM cart WHERE id_user1 = :id_user1");
      $query->execute(['id_user1' => $idUser]);
      $result = $query->fetch(PDO::FETCH_ASSOC);
      $this->idCart = $result['id'];
    } catch (PDOException $e) {
      error_log("CARTMODEL::GETCARTID-> " . $e->getMessage());
      return false;
    }
  }

  private function getCartProductInformation()
  {
    try {
      $query = $this->prepare("SELECT user_cart.prod_quantity, products.price
      FROM user_cart
      INNER JOIN products
      ON user_cart.prod_code1 = products.prod_code
      WHERE user_cart.id_cart1 = :cart_id");
      $query->execute(['cart_id' => $this->idCart]);
      $cart = $query->fetchAll(PDO::FETCH_ASSOC);
      return $cart;
    } catch (PDOException $e) {
      error_log("CARTMODEL::GETCARTINFORMATION -> " . $e->getMessage());
      return false;
    }
  }

  public function getCartProdQuantity($prodCode)
  {
    try {
      $query = $this->prepare("SELECT prod_quantity FROM user_cart WHERE id_cart1 = :id_cart1 AND prod_code1 = :prod_code1");
      $query->execute([
        'id_cart1' => $this->idCart,
        'prod_code1' => $prodCode
      ]);
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result['prod_quantity'];
    } catch (PDOException $e) {
      error_log("CARTMODEL::GETCARTID-> " . $e->getMessage());
      return false;
    }
  }

  public function getTotalPrice($idUser)
  {
    try {
      $query = $this->prepare("SELECT total_price FROM cart WHERE id_user1 = :id_user1");
      $query->execute([
        'id_user1' => $idUser
      ]);
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e) {
      error_log("CARTMODEL::GETOTALPRICE-> " . $e->getMessage());
      return false;
    }
  }
}
