<?php

class HomeModel extends Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function getCategories()
  {
    try {
      $query = $this->prepare("SELECT * FROM categories");
      $query->execute();
      $categories = $query->fetchAll(PDO::FETCH_ASSOC);
      return $categories;
    } catch (PDOException $e) {
      error_log("HOMEMODEL::GETCATEGORIES -> " . $e->getMessage());
      return false;
    }
  }

  public function getProducts()
  {
    try {
      $query = $this->prepare("SELECT products.prod_code,	products.name,	products.price,     products.prod_pic_url, cat_prod.*
                FROM products
                INNER JOIN cat_prod
                ON products.prod_code = cat_prod.prod_code1;");
      $query->execute();
      $products = $query->fetchAll(PDO::FETCH_ASSOC);
      return $products;
    } catch (PDOException $e) {
      error_log("HOMEMODEL::GETPRODUCTS-> " . $e->getMessage());
      return false;
    }
  }
}
