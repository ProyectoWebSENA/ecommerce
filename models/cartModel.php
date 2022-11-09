<?php

class CartModel extends Model
{
  private $idCart;
  private $idUser;
  private $prodCode;
  private $prodQuantity;
  private $totalPrice;

  public function __construct()
  {
    parent::__construct();
    $this->idCart = 0;
    $this->idUser = 0;
    $this->prodCode = 0;
    $this->prodQuantity = 0;
    $this->totalPrice = 0.0;
  }

  public function validateCartStatus($idUser)
  {
    try {
      $query = $this->prepare("SELECT id_user1 FROM cart WHERE id_user1 = :id_user1");
      $query->execute(['id_user1' => $idUser]);
      $query->fetch(PDO::FETCH_ASSOC);
      if ($query->rowCount() > 0) {
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
      $query = $this->prepare("INSERT INTO cart (id_user1) VALUES (:id_user1)");
      $query->execute(['id_user1' => $idUser]);
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::CREATEUSERCART-> " . $e->getMessage());
      return false;
    }
  }

  public function searchProductInCart($prodCode)
  {
    try {
      $query = $this->prepare("SELECT prod_code1 FROM user_cart WHERE prod_code1 = :prod_code1");
      $query->execute(['prod_code1' => $prodCode]);
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

  public function saveCartDetail($idCart, $prodCode, $prodQuantity)
  {
    try {
      $query = $this->prepare("INSERT INTO user_cart ( id_cart1,prod_code1, prod_quantity) 
                              VALUES (:id_cart1,:prod_code1, :prod_quantity)");
      $query->execute([
        'id_cart1' => $idCart,
        'prod_code1' => $prodCode,
        'prod_quantity' => $prodQuantity
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::SAVECARTDETAIL-> " . $e->getMessage());
      return false;
    }
  }

  public function updateTheTotal($idCart, $totalPrice)
  {
    try {
      $query = $this->prepare("UPDATE car SET total_price = :total_price
                WHERE id = :id");
      $query->execute([
        'total_price' => $totalPrice,
        'id' => $idCart
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::UPDATETHETOTAL-> " . $e->getMessage());
      return false;
    }
  }

  public function getCartInformation($idUser)
  {
    try {
      $query = $this->prepare("SELECT cart.*,user_cart.prod_code1,user_cart.prod_quantity 
                FROM cart
                INNER JOIN user_cart
                ON user_cart.id_cart = cart.id 
                WHERE id_user = :id_user");
      $query->execute(['id_user' => $idUser]);
      $cart = $query->fetch(PDO::FETCH_ASSOC);
      $this->idCart = $cart['id'];
      $this->idUser = $cart['id_user1'];
      $this->prodCode = $cart['prod_code1'];
      $this->prodQuantity = $cart['prod_quantity'];
      $this->totalPrice = $cart['total_price'];
      return $this;
    } catch (PDOException $e) {
      error_log("CARTMODEL::GETCARTINFORMATION -> " . $e->getMessage());
      return false;
    }
  }

  public function deleteProductFromCart($idCart, $prodCode)
  {
    try {
      $query = $this->prepare("DELETE FROM user_cart 
                WHERE id_cart1 = :id_cart1 AND prod_code1 = :prod_code1 ");
      $query->execute([
        'id_cart1' => $idCart,
        ['prod_code1' => $prodCode]
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::DELETEPRODUCTFROMCART ->" . $e->getMessage());
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

  public function updateProductFromCart($idCart, $prodCode, $prodQuantity)
  {
    try {
      $query = $this->prepare("UPDATE user_cart 
                SET  prod_quantity = :prod_quantity, 
                WHERE id_cart1 = :id_cart1 AND prod_code1 = :prod_code1");
      $query->execute([
        'prod_quantity' => $prodQuantity,
        'id_cart1' => $idCart,
        ['prod_code1' => $prodCode]
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("CARTMODEL::UPDATEPRODUCTFROMCART -> " . $e->getMessage());
      return false;
    }
  }


  //Metodos Getters
  public function getIdCart()
  {
    return $this->idCart;
  }
  public function getIdUser()
  {
    return $this->idUser;
  }
  public function getprodCode()
  {
    return $this->prodCode;
  }
  public function getProdQuantity()
  {
    return $this->prodQuantity;
  }
  public function getTotalPrice()
  {
    return $this->totalPrice;
  }
}
