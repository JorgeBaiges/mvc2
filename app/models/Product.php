<?php
namespace App\Models; # declaro namespace

require_once '../core/Model.php'; # preparo el acceso a otro fichero
use PDO;
use Core\Model;
use \DateTime; # sigo preparando mediante use.

class Product extends Model
{

    public function __construct()
{
    $this->fecha_compra = DateTime::createFromFormat('Y-m-d', $this->fecha_compra);
}

    public static function all()
    {
        $db = Product::db();
        $statement = $db->query('SELECT * FROM products');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public static function find($id){
        $db = Product::db();
        $statement = $db->prepare('SELECT * FROM products WHERE id=:id');
        $statement->execute(array(':id'=>$id));
        $statement->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $product = $statement->fetch(PDO::FETCH_CLASS);
        return $product;
    }

}