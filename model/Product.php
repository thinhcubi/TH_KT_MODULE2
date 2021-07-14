<?php
namespace Model;

class Product
{
    public string $name;
    public string $species;
    public int $price;
    public string $quantity;
    public string $description;
    public int $id;

    public function __construct($data)
    {
       $this->name = $data['name'];
       $this->species = $data['species'];
       $this->price = $data['price'];
        $this->quantity = $data['quantity'];
       $this->description = $data['description'];
    }
    public function setId($id){
        $this->id= $id;
    }

}