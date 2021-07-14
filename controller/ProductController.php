<?php
namespace Controller;

use Model\DBConnection;
use Model\ProductDB;
use Model\Product;



class ProductController
{
    public ProductDB $productDB;

    public function __construct()
    {
        $this->connection = new DBConnection("mysql:host=localhost;dbname=manage","root","Cubi@2712");
        $this->productDB = new ProductDB($this->connection->connect());
    }
    public function showList(){
        $products = $this->productDB->getAll();
        include_once "views/list.php";
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            include_once "views/add.php";
        }else{
            $errors = [];
            $fills = ['name','species','price','quantity','description'];
            foreach ($fills as $fill){
                if (empty($_POST[$fill])) {
                    $errors[$fill] = 'Không được để trống';
                }
            }
            if (empty($errors)){
                $data = [
                    'name' => $_POST['name'],
                     'species' => $_POST['species'],
                    'price' => $_POST['price'],
                    'quantity' => $_POST['quantity'],
                    'description' => $_POST['description']
                ];
                $product = new Product($data);
                $this->productDB->insert($product);
                header('Location: index.php');
            }else{
                include_once "views/add.php";
            }
        }

    }
    public function delete(){
        $id = $_REQUEST['id'];
        $this->productDB->delete($id);
        header('Location: index.php');
    }
    public function edit(){
        $id = $_REQUEST['id'];
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $products = $this->productDB->getId($id);
            include_once "views/edit.php";
        }
        $data = [
            'name' => $_POST['name'],
            'species' => $_POST['species'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity'],
            'description' => $_POST['description']
        ];
        $product = new Product($data);
        $product->setId($id);
        $this->productDB->update($id,$product);
        header('Location: index.php');

    }
    public function search(){
        $products = $this->productDB->search();
        include_once "views/search.php";
    }
}