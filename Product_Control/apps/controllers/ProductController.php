<?php


namespace App\Controllers;


use App\Services\ProductService;

class ProductController
{
    protected ProductService $productService;


    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function listProduct()
    {
        $products = $this->productService->convertData();
        include_once 'resources/views/product/list.php';
    }

    public function addProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'GET') {
            include_once 'resources/views/product/add.php';
        } else {
            $errors = $this->productService->validateForm();
            if (empty($errors)) {
                move_uploaded_file($_FILES["productImage"]["tmp_name"], "apps/uploads/".$_FILES['productImage']['name']);
                $this->productService->addData($_POST, $_FILES['productImage']['name']);
                header('Location: index.php');
            } else {
                include_once 'resources/views/product/add.php';
            }
        }
    }

    public function deleteProduct()
    {
        $this->productService->deleteData($_GET['id']);
        header('Location: index.php');
    }

    public function editProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'GET') {
            $product = $this->productService->getDataById($_GET['id']);
            include_once "resources/views/product/edit.php";
        } else {
            $errors = $this->productService->validateForm();
            $id = $_POST['id'];
            if (empty($errors)) {
                move_uploaded_file($_FILES["productImage"]["tmp_name"], "apps/uploads/".$_FILES['productImage']['name']);
                $this->productService->updateData($id, $_POST,$_FILES['productImage']['name']);
                header('Location: index.php');
            } else {
                $product = $this->productService->getDataById($id);
                include_once "resources/views/product/edit.php";
            }
        }
    }

    public function searchProduct()
    {
        $products = $this->productService->searchData($_POST["search"]);
        include_once 'resources/views/product/list.php';
    }

}