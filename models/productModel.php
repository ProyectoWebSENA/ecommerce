<?php

class ProductModel extends Model implements IModel
{
  private $prodCode;
  private $name;
  private $price;
  private $description;
  private $prodPicUrl;

  public function __construct()
  {
    parent::__construct();
    $this->prodCode = 0;
    $this->name = "";
    $this->price = 0.0;
    $this->description = "";
    $this->prodPicUrl = "";
  }
  public function save()
  {
    try {
      $query = $this->prepare("INSERT INTO products 
                (prod_code,name, price, description, prod_pic_url) 
                VALUES (:prod_code,:name, :price, :description, :prod_pic_url)");
      $query->execute([
        'prod_code' => $this->prodCode,
        'name' => $this->name,
        'price' => $this->price,
        'description' => $this->description,
        'prod_pic_url' => $this->prodPicUrl
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("PRODUCTMODEL::SAVE-> " . $e->getMessage());
      return false;
    }
  }

  public function get($prodCode)
  {
    try {
      $query = $this->prepare("SELECT * 
                FROM products 
                WHERE prod_code = :prod_code");
      $query->execute(['prod_code' => $prodCode]);
      $product = $query->fetch(PDO::FETCH_ASSOC);
      return $product;
    } catch (PDOException $e) {
      error_log("PRODUCTMODEL::GET -> " . $e->getMessage());
      return false;
    }
  }

  public function getAll()
  {
    try {
      $query = $this->prepare("SELECT * FROM products");
      $query->execute();
      $items = $query->fetchAll(PDO::FETCH_ASSOC);
      return $items;
    } catch (PDOException $e) {
      error_log("PRODUCTMODEL::GETALL -> " . $e->getMessage());
      return false;
    }
  }
  public function getAllWithParameter($name)
  {
    try {
      $query = $this->prepare("SELECT * 
                FROM products 
                WHERE name  like '%':name'%'");
      $query->execute(['name' => $name]);
      $product = $query->fetch(PDO::FETCH_ASSOC);
      $this->prodCode = $product['prod_code'];
      $this->name = $product['name'];
      $this->price = $product['price'];
      $this->description = $product['description'];
      $this->proPicUrl = $product['prod_pic_url'];
      return $this;
    } catch (PDOException $e) {
      error_log("PRODUCTMODEL::GETALLWITHPARAMETER -> " . $e->getMessage());
      return false;
    }
  }

  public function delete($prodCode)
  {
    try {
      $query = $this->prepare("DELETE FROM products 
            WHERE prod_code = :prod_code");
      $query->execute(['prod_code' => $prodCode]);
      return true;
    } catch (PDOException $e) {
      error_log("productMODEL::DELETE ->" . $e->getMessage());
      return false;
    }
  }

  public function update()
  {
    try {
      $query = $this->prepare("UPDATE products 
                SET name = :name, price = :price, description = :description, 
                prod_pic_url = :prod_pic_url 
                WHERE prod_code = :prod_code");
      $query->execute([
        'name' => $this->name,
        'price' => $this->price,
        'description' => $this->description,
        'prod_pic_url' => $this->prodPicUrl,
        'prod_code' => $this->prodCode
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("PRODUCTMODEL::UPDATE-> " . $e->getMessage());
      return false;
    }
  }

  public function from($array)
  {
    $this->prodCode = $array['prod_code'];
    $this->name = $array['name'];
    $this->price = $array['price'];
    $this->description = $array['description'];
    $this->prodPicUrl = $array['prod_pic_url'];
  }

  public function exists($prodCode)
  {
    try {
      $query = $this->prepare("SELECT prod_code 
                FROM products 
                WHERE prod_code = :prod_code");
      $query->execute(['prod_code' => $prodCode]);
      $query->fetch(PDO::FETCH_ASSOC);
      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log("PRODUCTMODEL::EXISTS -> " . $e->getMessage());
      return false;
    }
  }

  public function getProductReviews($prod_code)
  {
    try {
      $query = $this->prepare("SELECT * FROM reviews WHERE prod_code1 = :prod_code");
      $query->execute(['prod_code' => $prod_code]);
      $reviews = $query->fetchAll(PDO::FETCH_ASSOC);
      return $reviews;
    } catch (PDOException $e) {
      error_log("PRODUCTMODEL::GETPRODUCTREVIEWS -> " . $e->getMessage());
      return false;
    }
  }

  //Metodos Setters
  public function setProdCode($prodCode)
  {
    $this->prodCode = $prodCode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function setPrice($price)
  {
    $this->price = $price;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function setProdPicUrl($prodPicUrl)
  {
    $this->prodPicUrl = $prodPicUrl;
  }
  //Metodos Getters
  public function getprodCode()
  {
    return $this->prodCode;
  }
  public function getName()
  {
    return $this->name;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function getProdPicUrl()
  {
    return $this->prodPicUrl;
  }
}
