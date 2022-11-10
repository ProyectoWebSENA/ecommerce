<?php

class DashboardController extends SessionController
{
  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $this->view->render('dashboard/template');
  }

  public function searchAllUser()
  {
    $user = new UserModel();
    $data = $user->getAllUsers();
    $this->view->render('dashboard/template', $data);
  }
  public function searchUser()
  {
    $id = $_GET['id'];
    $user = new UserModel();
    $data = $user->get($id);
    $this->view->render('dashboard/template', $data);
  }

  public function deleteUser()
  {
    $id = $_GET['id'];
    $user = new UserModel();
    $user->delete($id);
    $this->view->render('dashboard/template');
  }

  public function updateUser()
  {
    if ($this->existsPOST(['name', 'email',  'cellphone', 'address', 'id'])) {
      $name = $this->getPost('name');
      $email = $this->getPost('email');
      $cellphone = $this->getPost('cellphone');
      $address = $this->getPost('address');
      $id = $this->getPost('id');


      if (
        $name == '' || empty($name) ||  $email == '' || empty($email)
        || $cellphone == '' || empty($cellphone) || $address == '' || empty($address)
        || $id == '' || empty($id)
      ) {
        error_log("ADMINPRODUCTCONTROLLER::UPDATEUSER empty");
        $this->redirect('product', ['error' => 'Campos vacios']);
        return false;
      }

      $userModel = new UserModel();
      $userModel->setName($name);
      $userModel->setEmail($email);
      $userModel->setCellphone($cellphone);
      $userModel->setAddress($address);
      $userModel->setName($name);
      $userModel->setId($id);

      if ($userModel->update()) {
        $this->redirect('', ['success' => "Usuario modificado correctamente"]);
      } else {
        $this->redirect('product', ['error' => "Error inesperado"]);
      }
    } else {
      error_log("ADMINPRODUCTCONTROLLER::UPDATEUSER error con los parametros");
      $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }
  public function searchAllCategories()
  {
    $category = new CategoryModel();
    $data = $category->getAll();
    $this->view->render('dashboard/template', $data);
  }
  public function viewRegisterCategory()
  {
    $this->view->render('dashboard/template');
  }

  public function viewUpdateCategory()
  {
    $catCode = $_GET['cat_code'];
    $categoryModel = new CategoryModel();
    $data = $categoryModel->get($catCode);
    $this->view->render('dashboard/template', $data);
  }

  public function registerCategory()
  {
    if ($this->existsPOST(['cat_code', 'name'])) {
      $catCode = $this->getPost('cat_code');
      $name = $this->getPost('name');

      if ($catCode == '' || empty($catCode) || $name == '' || empty($name)) {
        error_log("ADMINPRODUCTCONTROLLER::REGISTERCATEGORY empty");
        $this->redirect('product', ['error' => 'Campos vacios']);
        return false;
      }
      $categoryModel = new CategoryModel();
      $categoryModel->setCatCode($catCode);
      $categoryModel->setName($name);

      if ($categoryModel->exists($catCode)) {
        $this->redirect('product', ['error' => "La categoria ya existe"]);
      }

      if ($categoryModel->save()) {
        $this->redirect('', ['success' => "Categoria registrada correctamente"]);
      } else {
        $this->redirect('product', ['error' => "Error inesperado"]);
      }
    } else {
      error_log("ADMINPRODUCTCONTROLLER::REGISTERCATEGORY error con los parametros");
      $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  public function updateCategory()
  {
    if ($this->existsPOST(['cat_code', 'name'])) {
      $catCode = $this->getPost('cat_code');
      $name = $this->getPost('name');

      if ($catCode == '' || empty($catCode) || $name == '' || empty($name)) {
        error_log("ADMINPRODUCTCONTROLLER::UPDATECATEGORY empty");
        $this->redirect('product', ['error' => 'Campos vacios']);
        return false;
      }
      $categoryModel = new CategoryModel();
      $categoryModel->setCatCode($catCode);
      $categoryModel->setName($name);

      if ($categoryModel->update()) {
        $this->redirect('', ['success' => "Categoria modificada correctamente"]);
      } else {
        $this->redirect('product', ['error' => "Error inesperado"]);
      }
    } else {
      error_log("ADMINPRODUCTCONTROLLER::UPDATECATEGORY error con los parametros");
      $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  public function deleteCategory()
  {
    $catCode = $_GET['cat_code'];
    $category = new CategoryModel();
    $category->delete($catCode);
    $this->view->render('dashboard/template');
  }


  public function searchAllProducts()
  {
    $product = new ProductModel();
    $data = $product->getAll();
    $this->view->render('dashboard/template', $data);
  }

  public function viewRegisterProduct()
  {
    $this->view->render('dashboard/template');
  }

  public function viewUpdateProduct()
  {
    $prodCode = $_GET['prod_code'];
    $product = new ProductModel();
    $data = $product->get($prodCode);
    $this->view->render('dashboard/template', $data);
  }

  function registerProduct()
  {
    if ($this->existsPOST(['prod_code', 'name', 'price',  'description', 'stock', 'image'])) {
      $prodCode = $this->getPost('prod_code');
      $name = $this->getPost('name');
      $price = $this->getPost('price');
      $description = $this->getPost('description');
      $stock = $this->getPost('stock');

      if ($prodCode == '' || empty($prodCode) || $name == '' || empty($name) || $price == '' || empty($price) || $description == '' || empty($description)) {
        error_log("ADMINPRODUCTCONTROLLER::REGISTERPRODUCT empty");
        $this->redirect('product', ['error' => 'Campos vacios']);
        return false;
      }

      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "" . constant('URL') . "public/images/" . $filename;


      $productModel = new ProductModel();
      $productModel->setProdCode($prodCode);
      $productModel->setName($name);
      $productModel->setPrice($price);
      $productModel->setDescription($description);
      $productModel->setStock($stock);
      $productModel->setProdPicUrl($filename);

      move_uploaded_file($tempname, $folder);

      if ($productModel->exists($prodCode)) {
        $this->redirect('product', ['error' => "El producto ya existe"]);
      }

      if ($productModel->save()) {
        $this->redirect('', ['success' => "Producto registrado correctamente"]);
      } else {
        $this->redirect('product', ['error' => "Error inesperado"]);
      }
    } else {
      error_log("ADMINPRODUCTCONTROLLER::REGISTERPRODUCT error con los parametros");
      $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function deleteProduct()
  {
    if (isset($_GET['prod_code'])) {
      $prodCode = $_GET['prod_code'];

      if ($prodCode == '' || empty($prodCode)) {
        error_log("ADMINPRODUCTCONTROLLER::DELETEPRODUCT empty");
        $this->redirect('product', ['error' => 'Campos vacios']);
        return false;
      }

      $productModel = new ProductModel();
      if ($productModel->delete($prodCode)) {
        $this->redirect('', ['success' => "Producto eliminado"]);
      } else {
        $this->redirect('product', ['error' => "Error inesperado"]);
      }
    } else {
      error_log("ADMINPRODUCTCONTROLLER::DELETEPRODUCT error con los parametros");
      $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }

  function updateProduct()
  {
    if ($this->existsPOST(['prod_code', 'name', 'price',  'description', 'prod_pic_url'])) {
      $prodCode = $this->getPost('prod_code');
      $name = $this->getPost('name');
      $price = $this->getPost('price');
      $description = $this->getPost('description');
      $prodPicUrl = $this->getPost('prod_pic_url');

      if (
        $prodCode == '' || empty($prodCode) || $name == '' || empty($name) || $price == ''
        || empty($price) || $description == '' || empty($description) || $prodPicUrl == '' || empty($prodPicUrl)
      ) {
        error_log("ADMINPRODUCTCONTROLLER::UPDATEPRODUCT empty");
        $this->redirect('product', ['error' => 'Campos vacios']);
        return false;
      }

      $productModel = new ProductModel();
      $productModel->setProdCode($prodCode);
      $productModel->setName($name);
      $productModel->setPrice($price);
      $productModel->setDescription($description);
      $productModel->setProdPicUrl($prodPicUrl);

      if ($productModel->update()) {
        $this->redirect('', ['success' => "Producto modificado correctamente"]);
      } else {
        $this->redirect('product', ['error' => "Error inesperado"]);
      }
    } else {
      error_log("ADMINPRODUCTCONTROLLER::UPDATEPRODUCT error con los parametros");
      $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }
}
