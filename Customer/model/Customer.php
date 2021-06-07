<?php


namespace Model;


class Customer
{
    public int $id;
    public string $name;
    public string $email;
    public string $address;


    public function __construct(string $name,
                                string $email,
                                string $address)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
    }

}