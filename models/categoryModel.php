<?php

class CategoryModel extends Model implements IModel
{
  private $catCode;
  private $name;

  public function __construct()
  {
    parent::__construct();
    $this->catCode = 0;
    $this->name = "";
  }

  public function save()
  {
    try {
      $query = $this->prepare("INSERT INTO categories 
                (cat_code,name) 
                VALUES (:cat_code,:name)");
      $query->execute([
        'cat_code' => $this->catCode,
        'name' => $this->name
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("CATEGORYMODEL::SAVE-> " . $e->getMessage());
      return false;
    }
  }

  public function get($catCode)
  {
    try {
      $query = $this->prepare("SELECT * 
                FROM categories 
                WHERE cat_code = :cat_code");
      $query->execute(['cat_code' => $catCode]);
      $category = $query->fetch(PDO::FETCH_ASSOC);
      $this->catCode = $category['cat_code'];
      $this->name = $category['name'];
      return $this;
    } catch (PDOException $e) {
      error_log("CATEGORYMODEL::GET -> " . $e->getMessage());
      return false;
    }
  }
  public function getAll()
  {
    try {
      $query = $this->prepare("SELECT * 
                FROM categories");
      $query->execute();
      $items = $query->fetchAll(PDO::FETCH_ASSOC);
      return $items;
    } catch (PDOException $e) {
      error_log("CATEGORYMODEL::GETALL -> " . $e->getMessage());
      return false;
    }
  }


  public function delete($catCode)
  {
    try {
      $query = $this->prepare("DELETE FROM categories 
                WHERE cat_code = :cat_code");
      $query->execute(['cat_code' => $catCode]);
      return true;
    } catch (PDOException $e) {
      error_log("CATEGORYMODEL::DELETE ->" . $e->getMessage());
      return false;
    }
  }

  public function update()
  {
    try {
      $query = $this->prepare("UPDATE categories 
                SET name = :name 
                WHERE cat_code = :cat_code");
      $query->execute([
        "name" => $this->name,
        "cat_code" => $this->catCode
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("CATEGORYMODEL::UPDATE-> " . $e->getMessage());
      return false;
    }
  }

  public function from($array)
  {
    $this->catCode = $array['cat_code'];
    $this->name = $array['name'];
  }

  public function exists($catCode)
  {
    try {
      $query = $this->prepare("SELECT cat_code 
                FROM categories 
                WHERE cat_code = :cat_code");
      $query->execute(['cat_code' => $catCode]);
      $query->fetch(PDO::FETCH_ASSOC);
      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log("CATEGORYMODEL::EXISTS -> " . $e->getMessage());
      return false;
    }
  }

  //Metodos Setters
  public function setCatCode($catCode)
  {
    $this->catCode = $catCode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }

  //Metodos Getters
  public function getCatCode()
  {
    return $this->catCode;
  }
  public function getName()
  {
    return $this->name;
  }
}
