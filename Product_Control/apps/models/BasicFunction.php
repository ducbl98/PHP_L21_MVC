<?php


namespace App\Models;


interface BasicFunction
{
    public function getAllData();

    public function insertData(Product $product);

    public function deleteData($id);

    public function getDataById($id);

    public function updateData($id,Product $product);
}