<?php

namespace Vistion\Oop\Model;

use Vistion\Oop\Core\Db;
use Vistion\Oop\interfaces\IModel;

abstract class Model  implements  IModel
{
    abstract static protected function getTableName(): string;


    public static function getOne(int $id) :static
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM $table WHERE id = :id" . PHP_EOL;
        return Db::getInstance()->queryOneObject($sql,['id' => $id],static::class);
    }


    public static function getAll(): array
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM $table" . PHP_EOL;
        return Db::getInstance()->queryAll($sql);
    }

    public function query()
    {
        return $this;
    }
    public function insert(): static
    {
        $table = static::getTableName();
        $columns = [];
        $values = [];


        foreach ($this as $key => $value) {
            if ($key != 'id') {
                $columns[] = $key;
                $values[] = $value;
            }
        }


        $columnsList = implode(',', $columns);
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        $sql = "INSERT INTO $table ($columnsList) VALUES ($placeholders)";


        Db::getInstance()->execute($sql, $values);


        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }
    public function where(string $column, string $value)
    {

        $this->whereClause = "WHERE {$column} = '{$value}'";
        return $this;
    }
}