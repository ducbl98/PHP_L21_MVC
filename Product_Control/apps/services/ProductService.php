<?php


namespace App\Services;


use App\Models\Product;
use App\Models\ProductModel;

class ProductService implements BaseService
{
    protected ProductModel $productModel;


    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function convertData(): array
    {
        $data = $this->productModel->getAllData();
        $products = [];
        foreach ($data as $item) {
            $product = new Product($item);
            $product->setId($item['id']);
            $product->setImage($item['productImage']);
            array_push($products, $product);

        }
        return $products;
    }

    public function addData($data, $image)
    {
        $product = new Product($data);
        $product->setImage($image);
        $this->productModel->insertData($product);
    }

    public function deleteData($id)
    {
        $imageToDelete=$this->getDataById($id)->getImage();
        unlink("apps/uploads/".$imageToDelete);
        $this->productModel->deleteData($id);
    }

    public function validateForm(): array
    {
        $errors = [];
        $fields = ['productCode', 'productName', 'productPrice', 'productAmount', 'productStatus'];
        if (!empty($this->validateImage())) {
            $errors['productImage'] = $this->validateImage();
        }
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Can\'t be empty';
            }
        }

        return $errors;
    }

    public function getDataById($id): Product
    {
        $data = $this->productModel->getDataById($id);
        $product = new Product($data[0]);
        $product->setId($data[0]['id']);
        $product->setImage($data[0]['productImage']);
        return $product;
    }

    public function updateData($id, $data,$image)
    {
        $product = new Product($data);
        $product->setImage($image);
        $this->productModel->updateData($id, $product);
    }

    public function searchData($keyword): array
    {
        $data = $this->productModel->findData($keyword);
        $products = [];

        foreach ($data as $item) {
            $product = new Product($item);
            $product->setId($item['id']);
            array_push($products, $product);

        }
        return $products;
    }

    public function validateImage(): array
    {
        $errorUpload = [];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['productImage']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($_FILES['productImage']['name'] == null) {
            $errorUpload[] = "Image is not upload";
        } else {

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["productImage"]["tmp_name"]);
            if ($check == false) {
                $errorUpload[] = "File is not an image.";
            }

            // Check if file already exists
            if (file_exists($targetFile)) {
                $errorUpload[] = "Image is already existed ";
            }

            // Check file size
            if ($_FILES["productImage"]["size"] > 500000) {
                $errorUpload[] = "Image is too large";
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $errorUpload[] = "Only JPG, JPEG, PNG & GIF files are allowed.";
            }

        }
        return $errorUpload;
    }
}