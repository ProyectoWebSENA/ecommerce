<?php

class AdminProductController extends SessionController
{
    function render()
    {
        $this->view->render('login/index');
    }
    
    function registerProduct()
    {
        if ($this->existsPOST(['prod_code', 'name', 'price',  'description', 'prod_pic_url', 'type_prod'])) {
            $productCode = $this->getPost('prod_code');
            $name = $this->getPost('name');
            $price = $this->getPost('price');
            $description = $this->getPost('description');
            $prodPicUrl = $this->getPost('prod_pic_url');
            $typeProd = $this->getPost('type_prod');

            if ($productCode == '' || empty($productCode) || $name == '' || empty($name) || $price == '' || empty($price) || $description == '' || empty($description) || $prodPicUrl == '' || empty($prodPicUrl) || $typeProd == '' || empty($typeProd)) {
                error_log("ADMINPRODUCTCONTROLLER::REGISTERPRODUCT empty");
                $this->redirect('product', ['error' => 'Campos vacios']);
                return false;
            }
            $productModel = new ProductModel();
            $productModel->setProductCode($productCode);
            $productModel->setName($name);
            $productModel->setPrice($price);
            $productModel->setDescription($description);
            $productModel->setProdPicUrl($prodPicUrl);
            $productModel->setTypeProd($typeProd);

            if ($productModel->exists($productCode)) {
                $this->redirect('product', ['error' => "El producto ya existe"]);
            }

            if ($productModel->save()) {
                $this->redirect('', ['success' => "Producto registrado correctamente"]);
            } else {
                $this->redirect('product', ['error' => "Error inesperado"]);
            }
        } else {
            error_log("PRODUCT::REGISTERPRODUCT error con los parametros");
            $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
        }
    }

    function deleteProduct()
    {
        if ($this->existsPOST(['prod_code'])) {
            $productCode = $this->getPost('prod_code');

            if ($productCode == '' || empty($productCode)) {
                error_log("ADMINPRODUCTCONTROLLER::DELETEPRODUCT empty");
                $this->redirect('product', ['error' => 'Campos vacios']);
                return false;
            }

            if ($this->model->delete($productCode)) {
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
        if ($this->existsPOST(['prod_code', 'name', 'price',  'description', 'prod_pic_url', 'type_prod'])) {
            $productCode = $this->getPost('prod_code');
            $name = $this->getPost('name');
            $price = $this->getPost('price');
            $description = $this->getPost('description');
            $prodPicUrl = $this->getPost('prod_pic_url');
            $typeProd = $this->getPost('type_prod');

            if ($productCode == '' || empty($productCode) || $name == '' || empty($name) || $price == '' || empty($price) || $description == '' || empty($description) || $prodPicUrl == '' || empty($prodPicUrl) || $typeProd == '' || empty($typeProd)) {
                error_log("ADMINPRODUCTCONTROLLER::UPDATEPRODUCT empty");
                $this->redirect('product', ['error' => 'Campos vacios']);
                return false;
            }

            $productModel = new ProductModel();
            $productModel->setProductCode($productCode);
            $productModel->setName($name);
            $productModel->setPrice($price);
            $productModel->setDescription($description);
            $productModel->setProdPicUrl($prodPicUrl);
            $productModel->setTypeProd($typeProd);

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
