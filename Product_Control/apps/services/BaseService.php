<?php


namespace App\Services;


interface BaseService
{
    public function convertData();

    public function addData($data, $image);

    public function deleteData($id);

    public function getDataById($id);

    public function updateData($id, $data,$image);

    public function validateForm();

    public function validateImage();

    public function searchData($keyword);

}