<?php

class SingleProductController extends SessionController
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('product/---');
    }

    function searchProduct()
    {
        if ($this->existsPOST(['prod_code'])) {
            $productCode = $this->getPost('prod_code');

            if ($productCode == '' || empty($productCode)) {
                error_log("SINGLEPRODUCTCONTROLLER::SEARCHPRODUCT empty");
                $this->redirect('product', ['error' => 'Campos vacios']);
                return false;
            }

            if ($this->model->searchProduct($productCode)) {
                $this->redirect('', ['success' => "Producto encontrado"]);
                return $this->model;
            } else {
                $this->redirect('product', ['error' => "Error inesperado"]);
            }
        } else {
            error_log("SINGLEPRODUCTCONTROLLER::SEARCHPRODUCT error con los parametros");
            $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
        }
    }
}
