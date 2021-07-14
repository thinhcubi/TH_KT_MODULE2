<?php
namespace Model;

use PDO;

class ProductDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAll() : array
    {
        $sql = "SELECT * FROM `manage_2`";
        $stmt = $this->connection->query($sql);
        $result = $stmt->fetchAll();
        $products = [];
        foreach ($result as $item){
           $data = [
               'name' => $item['name'],
               'species' => $item['species'],
               'price' => $item['price'],
               'quantity' => $item['quantity'],
               'description' => $item['description']
           ];
           $product = new Product($data);
            $product->setId($item['id']);
            $products[] = $product;
        }
        return $products;
    }
    public function insert($product){
        $sql = "INSERT INTO `manage_2`(name,species,price,quantity,description) VALUES(?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$product->name);
        $stmt->bindParam(2,$product->species);
        $stmt->bindParam(3,$product->price);
        $stmt->bindParam(4,$product->quantity);
        $stmt->bindParam(5,$product->description);
        return $stmt->execute();
    }
    public function delete($id){
        $sql = "DELETE FROM `manage_2` WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }
    public function getId($id): array
    {
        $sql = "SELECT * FROM `manage_2` WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($result as $item){
            $data = [
                'name' => $item['name'],
                'species' => $item['species'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'description' => $item['description']
            ];
            $product = new Product($data);
            $product->setId($item['id']);
            $products[] = $product;
        }
        return $products;
    }
    public function update($id,$product){
        $sql = "UPDATE `manage_2` SET name=?,species=?,price=?,quantity=?,description=? WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$product->name);
        $stmt->bindParam(2,$product->species);
        $stmt->bindParam(3,$product->price);
        $stmt->bindParam(4,$product->quantity);
        $stmt->bindParam(5,$product->description);
        $stmt->bindParam(6,$id);
        return $stmt->execute();
    }
    public function search() : array
    {
        $value = $_REQUEST['search'];
        $sql  = "SELECT * FROM `manage_2` WHERE `name` LIKE "."'%".$value."%"."'; ";
        $stmt = $this->connection->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $products= [];
        foreach ($result as $item){
            $data = [
                'name' => $item['name'],
                'species' => $item['species'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'description' => $item['description']
            ];
          $product = new Product($data);
          $product->setId($item['id']);
          $products[] = $product;
        }
        return $products;
    }

}