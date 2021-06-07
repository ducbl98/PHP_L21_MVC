<?php


namespace Model;


class CustomerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create(object $customer)
    {
        $sql = 'INSERT INTO Customers(name,email,address) VALUES (?,?,?)';
        $statement = $this->connection->prepare(@$sql);
        $statement->bindParam(1, $customer->name);
        $statement->bindParam(2, $customer->email);
        $statement->bindParam(3, $customer->address);
        return $statement->execute();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM `Customers`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $customers = [];
        foreach ($result as $row) {
            $customer = new Customer($row['name'], $row['email'], $row['address']);
            $customer->id = $row['id'];
            $customers[] = $customer;
        }
        return $customers;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `Customers` WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $customer)
    {
        $sql = "UPDATE `Customers` SET name = ?, email = ?, address = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $customer->name);
        $statement->bindParam(2, $customer->email);
        $statement->bindParam(3, $customer->address);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }
}