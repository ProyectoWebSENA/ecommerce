<?php

class ReviewModel extends Model
{
    private $id;
    private $idUser;
    private $prodCode;
    private $starts;
    private $comment;

    public function __construct()
    {
        parent::__construct();
        $this->id = 0;
        $this->idUser = 0;
        $this->prodCode = 0;
        $this->starts = 0;
        $this->comment = "";
    }

    public function save()
    {
        try {
            $query = $this->prepare("INSERT INTO reviews 
                (id_user1, prod_code1, starts, comment) 
                VALUES (:id_user1, :prod_code1, :starts, :comment)");
            $query->execute([
                'id_user1' => $this->idUser,
                'prod_code1' => $this->prodCode,
                'starts' => $this->starts,
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
            $this->starts = $review['starts'];
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

    public function from($array)
    {
        $this->id = $array['id'];
        $this->idUser = $array['id_user'];
        $this->prodCode = $array['prod_code'];
        $this->starts = $array['starts'];
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
    public function setStarts($starts)
    {
        $this->starts = $starts;
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
    public function getStarts()
    {
        return $this->starts;
    }
    public function getComment()
    {
        return $this->comment;
    }
}
