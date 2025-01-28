<?php

namespace Vistion\Oop\Model;

use PDOStatement;
use Vistion\Oop\Core\Db;


// роутинг
//localhost/index.php
//localhost/posts.php
//localhost/post.php?id=2


class Category extends Model
{
    protected ?int $id = null;
    protected ?string $category;

    protected array $props = [
        'id' => false,
        'category' => false,
    ];


    public function __construct(string $category = null)
    {
        $this->category = $category;
    }

    public function insert(): Category
    {
        $sql = "INSERT INTO categories (category) VALUES (?)";
        Db::getInstance()->execute($sql, [$this->category]);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    protected static function getTableName(): string
    {
        return 'categories';
    }

}