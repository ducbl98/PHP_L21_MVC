<?php


namespace App\Models;


class Product
{
    protected int $id;
    protected string $code;
    protected string $name;
    protected float $price;
    protected int $amount;
    protected string $description;
    protected mixed $image;

    public function getImage(): mixed
    {
        return $this->image;
    }

    public function setImage(mixed $image): void
    {
        $this->image = $image;
    }

    protected string $status;


    public function __construct($data)
    {
        $this->code = $data['productCode'];
        $this->name = $data['productName'];
        $this->price = $data['productPrice'];
        $this->amount = $data['productAmount'];
        $this->description = $data['productDescription'];
        $this->status = $data['productStatus'];
    }

    public function getCode(): mixed
    {
        return $this->code;
    }

    public function getName(): mixed
    {
        return $this->name;
    }

    public function getPrice(): mixed
    {
        return $this->price;
    }

    public function getAmount(): mixed
    {
        return $this->amount;
    }

    public function getDescription(): mixed
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


}