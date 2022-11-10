<?php

class ReviewModel extends Model
{
  private $id;
  private $idUser;
  private $prodCode;
  private $stars;
  private $comment;

  public function __construct()
  {
    parent::__construct();
    $this->id = 0;
    $this->idUser = 0;
    $this->prodCode = 0;
    $this->stars = 0;
    $this->comment = "";
  }

  public function save()
  {
    try {
      $query = $this->prepare("INSERT INTO reviews 
                (id_user1, prod_code1, stars, comment) 
                VALUES (:id_user1, :prod_code1, :stars, :comment)");
      $query->execute([
        'id_user1' => $this->idUser,
        'prod_code1' => $this->prodCode,
        'stars' => $this->stars,
        'comment' => $this->comment
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("REVIEWMODEL::SAVE-> " . $e->getMessage());
      return false;
    }
  }

  public function get($prod_code)
  {
    try {
      $query = $this->prepare("SELECT * 
                FROM reviews 
                WHERE prod_code1 = :prod_code1");
      $query->execute(['prod_code1' => $prod_code]);
      $review = $query->fetch(PDO::FETCH_ASSOC);
      $this->id = $review['id'];
      $this->idUser = $review['id_user1'];
      $this->prodCode = $review['prod_code1'];
      $this->stars = $review['stars'];
      $this->comment = $review['comment'];
      return $this;
    } catch (PDOException $e) {
      error_log("REVIEWMODEL::GET -> " . $e->getMessage());
      return false;
    }
  }

  public function delete($id)
  {
    try {
      $query = $this->prepare("DELETE FROM reviews 
                WHERE id = :id");
      $query->execute(['id' => $id]);
      return true;
    } catch (PDOException $e) {
      error_log("REVIEWMODEL::DELETE ->" . $e->getMessage());
      return false;
    }
  }

  public function checkReview($user_id, $prod_code)
  {
    try {
      $query = $this->prepare("SELECT id 
                FROM reviews 
                WHERE prod_code1 = :prod_code1 and id_user1 = :id_user1");
      $query->execute([
        'prod_code1' => $prod_code,
        'id_user1' => $user_id
      ]);
      $query->fetch(PDO::FETCH_ASSOC);
      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log("REVIEWMODEL::GET -> " . $e->getMessage());
      return false;
    }
  }

  public function from($array)
  {
    $this->id = $array['id'];
    $this->idUser = $array['id_user'];
    $this->prodCode = $array['prod_code'];
    $this->stars = $array['stars'];
    $this->comment = $array['comment'];
  }

  //Metodos Setters
  public function setId($id)
  {
    $this->id = $id;
  }
  public function setIdUser($idUser)
  {
    $this->idUser = $idUser;
  }
  public function setProdCode($prodCode)
  {
    $this->prodCode = $prodCode;
  }
  public function setStars($stars)
  {
    $this->stars = $stars;
  }
  public function setComment($comment)
  {
    $this->comment = $comment;
  }

  //Metodos Getters
  public function getId()
  {
    return $this->id;
  }
  public function getIdUser()
  {
    return $this->idUser;
  }
  public function getProdCode()
  {
    return $this->prodCode;
  }
  public function getstars()
  {
    return $this->stars;
  }
  public function getComment()
  {
    return $this->comment;
  }
}
