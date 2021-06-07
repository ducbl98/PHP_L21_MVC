<?php


namespace App\Models;


class ProductModel extends Models implements BasicFunction
{

    public function getAllData(): array
    {
        $sql = 'SELECT * FROM `Products`';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function insertData(Product $product): bool
    {
        $sql = 'INSERT INTO `Products`(productCode,productName,productPrice,productAmount,productDescription,productImage,productStatus) 
                VALUES (:code,:name,:price,:amount,:description,:image,:status);';
        $stmt = $this->connection->prepare($sql);
        $code = $product->getCode();
        $stmt->bindParam(":code", $code);
        $name = $product->getName();
        $stmt->bindParam(":name", $name);
        $price = $product->getPrice();
        $stmt->bindParam(":price", $price);
        $amount = $product->getAmount();
        $stmt->bindParam(":amount", $amount);
        $description = $product->getDescription();
        $stmt->bindParam(":description", $description);
        $status = $product->getStatus();
        $stmt->bindParam(":status", $status);
        $image = $product->getImage();
        $stmt->bindParam(":image", $image);
        return $stmt->execute();
    }

    public function deleteData($id): bool
    {
        $sql = 'DELETE FROM `Products` WHERE id = :id;
                SET @autoid=0;
                UPDATE `Products` SET id=@autoid:=(@autoid +1 );
                ALTER TABLE `Products` AUTO_INCREMENT =1;';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function getDataById($id): array
    {
        $sql = 'SELECT * FROM `Products` WHERE id =:id';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateData($id, Product $product): bool
    {
        $sql = 'UPDATE `Products` 
                  SET `productCode`=:code,
                      `productName`=:name,
                      `productPrice`=:price,
                      `productAmount`=:amount,
                      `productDescription`=:description,
                      `productImage`=:image,
                      `productStatus`=:status WHERE `id`=:id';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":id", $id);
        $name = $product->getName();
        $stmt->bindParam(":name", $name);
        $code = $product->getCode();
        $stmt->bindParam(":code", $code);
        $amount = $product->getAmount();
        $stmt->bindParam(":amount", $amount);
        $price = $product->getPrice();
        $stmt->bindParam(":price", $price);
        $description = $product->getDescription();
        $stmt->bindParam(":description", $description);
        $image = $product->getImage();
        $stmt->bindParam(":image", $image);
        $status = $product->getStatus();
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    }

    public function findData($keyword): array
    {
        $sql = 'SELECT * FROM `Products` WHERE `productName` LIKE :keyword';
        $stmt = $this->connection->prepare($sql);
        $findKey = '%' . $keyword . '%';
        $stmt->bindParam(":keyword", $findKey);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}