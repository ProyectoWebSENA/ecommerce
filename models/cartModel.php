<?php

class CartModel extends Model
{
    private $idCart;
    private $idUser;
    private $idProd;
    private $prodQuantity;
    private $totalPrice;

    public function __construct()
    {
        parent::__construct();
        $this->idCart = 0;
        $this->idUser = 0;
        $this->idProd = 0;
        $this->prodQuantity = 0;
        $this->totalPrice = 0.0;
    }

    public function validateCartStatus($idUser)
    {
        try {
            $query = $this->prepare("SELECT id_user FROM  carrito WHERE id_user = :id_user");
            $query->execute(['id_user' => $idUser]);
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
            $query = $this->prepare("INSERT INTO carrito (id_user) 
                VALUES (:id_user)");
            $query->execute(['id_user' => $idUser]);
            return true;
        } catch (PDOException $e) {
            error_log("CARTMODEL::CREATEUSERCART-> " . $e->getMessage());
            return false;
        }
    }

    public function searchProductInCart($idProd)
    {
        try {
            $query = $this->prepare("SELECT id_prod FROM user_cart WHERE id_prod = :id_prod");
            $query->execute(['id_prod' => $idProd]);
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

    public function saveCartDetail($idCart, $idProd, $prodQuantity)
    {
        try {
            $query = $this->prepare("INSERT INTO user_cart ( id_cart,id_prod, prod_quantity) 
                VALUES (:id_cart,:id_prod, :prod_quantity)");
            $query->execute([
                'id_cart' => $idCart,
                'id_prod' => $idProd,
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
            $query = $this->prepare("UPDATE carrito SET total_price = :total_price
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
            $query = $this->prepare("SELECT carrito.*,user_cart.id_prod,user_cart.prod_quantity 
                FROM carrito
                INNER JOIN user_cart
                ON user_cart.id_cart = carrito.id 
                WHERE id_user = :id_user");
            $query->execute(['id_user' => $idUser]);
            $cart = $query->fetch(PDO::FETCH_ASSOC);
            $this->idCart = $cart['id'];
            $this->idUser = $cart['id_user'];
            $this->idProd = $cart['id_prod'];
            $this->prodQuantity = $cart['prod_quantity'];
            $this->totalPrice = $cart['total_price'];
            return $this;
        } catch (PDOException $e) {
            error_log("CARTMODEL::GETCARTINFORMATION -> " . $e->getMessage());
            return false;
        }
    }

    public function deleteProductFromCart($idCart, $idProd)
    {
        try {
            $query = $this->prepare("DELETE FROM user_cart 
                WHERE id_cart = :id_cart AND id_prod = :id_prod ");
            $query->execute([
                'id_cart' => $idCart,
                ['id_prod' => $idProd]
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
                WHERE id_cart = :id_cart");
            $query->execute(['id_cart' => $idCart]);
            return true;
        } catch (PDOException $e) {
            error_log("cartMODEL::DELETECARTINFORMATION ->" . $e->getMessage());
            return false;
        }
    }

    public function updateProductFromCart($idCart, $idProd, $prodQuantity)
    {
        try {
            $query = $this->prepare("UPDATE user_cart 
                SET  prod_quantity = :prod_quantity, 
                WHERE id_cart = :id_cart AND id_prod = :id_prod");
            $query->execute([
                'prod_quantity' => $prodQuantity,
                'id_cart' => $idCart,
                ['id_prod' => $idProd]
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
    public function getIdProd()
    {
        return $this->idProd;
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
