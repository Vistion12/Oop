<?php

namespace Vistion\Oop\Model;

use PDOStatement;
use Vistion\Oop\Core\Db;

class Category extends Model
{
    public ?int $id = null;
    public ?string $category;


    public function __construct(string $category=null)
    {

        $this->category = $category;
    }


    protected static function getTableName(): string
    {
        return 'categories';
    }

//    public function insert(): Category
//    {
//        $sql = "INSERT INTO categories (category) VALUES (?)";
//        Db::getInstance()->execute($sql, [$this->category]);
//        $this->id = Db::getInstance()->lastInsertId();
//        return $this;
//    }

    public function test()
    {
        foreach ($this as $key => $value) {
            echo $key . " => " . $value . "\n";
        }
    }
}