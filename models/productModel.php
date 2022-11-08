<?php

class ProductModel extends Model implements IModel
{
    private $productCode;
    private $name;
    private $price;
    private $description;
    private $prodPicUrl;
    private $typeProd;

    public function __construct()
    {
        parent::__construct();
        $this->productCode = 0;
        $this->name = "";
        $this->price = 0.0;
        $this->description = "";
        $this->prodPicUrl = "";
        $this->typeProd = "";
    }
    public function save()
    {
        try {
            $query = $this->prepare("INSERT INTO productos ( prod_code,name, price, description, prod_pic_url, tipo_prod) 
                VALUES (:prod_code,:name, :price, :description, :prod_pic_url, :tipo_prod)");
            $query->execute([
                'prod_code' => $this->productCode,
                'name' => $this->name,
                'price' => $this->price,
                'description' => $this->description,
                'prod_pic_url' => $this->prodPicUrl,
                'tipo_prod' => $this->typeProd
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("PRODUCTMODEL::SAVE-> " . $e->getMessage());
            return false;
        }
    }

    public function get($productCode)
    {
        try {
            $query = $this->prepare("SELECT * FROM productos WHERE prod_code = :prod_code");
            $query->execute(['prod_code' => $productCode]);
            $product = $query->fetch(PDO::FETCH_ASSOC);
            $this->productCode = $product['prod_code'];
            $this->name = $product['name'];
            $this->price = $product['price'];
            $this->description = $product['description'];
            $this->proPicUrl = $product['prod_pic_url'];
            $this->typeProd = $product['tipo_prod'];
            return $this;
        } catch (PDOException $e) {
            error_log("PRODUCTMODEL::GET -> " . $e->getMessage());
            return false;
        }
    }

    public function getAll()
    {
        try {
            $query = $this->prepare("SELECT * FROM productos");
            $query->execute();
            $product = $query->fetch(PDO::FETCH_ASSOC);
            $this->productCode = $product['prod_code'];
            $this->name = $product['name'];
            $this->price = $product['price'];
            $this->description = $product['description'];
            $this->proPicUrl = $product['prod_pic_url'];
            $this->typeProd = $product['tipo_prod'];
            return $this;
        } catch (PDOException $e) {
            error_log("PRODUCTMODEL::GETALL -> " . $e->getMessage());
            return false;
        }
    }
    public function getAllWithParameter($name)
    {
        try {
            $query = $this->prepare("SELECT * FROM productos WHERE name  like '%':name'%'");
            $query->execute(['name' => $name]);
            $product = $query->fetch(PDO::FETCH_ASSOC);
            $this->productCode = $product['prod_code'];
            $this->name = $product['name'];
            $this->price = $product['price'];
            $this->description = $product['description'];
            $this->proPicUrl = $product['prod_pic_url'];
            $this->typeProd = $product['tipo_prod'];
            return $this;
        } catch (PDOException $e) {
            error_log("PRODUCTMODEL::GETALLWITHPARAMETER -> " . $e->getMessage());
            return false;
        }
    }

    public function delete($productCode)
    {
        try {
            $query = $this->prepare("DELETE FROM productos WHERE prod_code = :prod_code");
            $query->execute(['prod_code' => $productCode]);
            return true;
        } catch (PDOException $e) {
            error_log("productMODEL::DELETE ->" . $e->getMessage());
            return false;
        }
    }

    public function update()
    {
        try {
            $query = $this->prepare("UPDATE productos SET name = :name, price = :price, description = :description, 
                prod_pic_url = :prod_pic_url, tipo_prod = :tipo_prod WHERE prod_code = :prod_code");
            $query->execute([
                'name' => $this->name,
                'price' => $this->price,
                'description' => $this->description,
                'prod_pic_url' => $this->prodPicUrl,
                'tipo_prod' => $this->typeProd,
                'prod_code' => $this->productCode
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("PRODUCTMODEL::UPDATE-> " . $e->getMessage());
            return false;
        }
    }

    public function from($array)
    {
        $this->productCode = $array['prod_code'];
        $this->name = $array['name'];
        $this->price = $array['price'];
        $this->description = $array['description'];
        $this->prodPicUrl = $array['prod_pic_url'];
        $this->typeProd = $array['tipo_prod'];
    }

    public function exists($productCode)
    {
        try {
            $query = $this->prepare("SELECT prod_code FROM productos WHERE prod_code = :prod_code");
            $query->execute(['prod_code' => $productCode]);
            $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("PRODUCTMODEL::GET -> " . $e->getMessage());
            return false;
        }
    }

    //Metodos Setters
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
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
    public function setTypeProd($typeProd)
    {
        $this->typeProd = $typeProd;
    }

    //Metodos Getters
    public function getProductCode()
    {
        return $this->productCode;
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
    public function getTypeProd()
    {
        return $this->typeProd;
    }
}
