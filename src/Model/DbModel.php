<?php

namespace Vistion\Oop\Model;

use Vistion\Oop\Core\Db;
use Vistion\Oop\interfaces\IModel;

abstract class DbModel implements IModel
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

    public function update(): static
    {
        $table = static::getTableName();
        $columns = [];
        $values = [];

        // Собираем имена полей и их значения, чтобы построить запрос UPDATE
        foreach ($this as $key => $value) {
            // Проверяем, разрешено ли это поле для обновления
            if ($key != 'id' && isset($this->props[$key]) && $this->props[$key] === true && isset($value)) {
                $columns[] = "$key = ?";
                $values[] = $value;
            }
        }

        // Если нет данных для обновления, выходим
        if (empty($columns)) {
            throw new \Exception("Нет данных для обновления.");
        }

        $columnsList = implode(', ', $columns);
        $sql = "UPDATE $table SET $columnsList WHERE id = ?";

        // Добавляем значение id в конец списка значений
        $values[] = $this->id;

        // Выполняем запрос
        Db::getInstance()->execute($sql, $values);

        return $this;  // Возвращаем текущий объект для цепочек вызовов
    }


    public function where(string $column, string $value)
    {

        $this->whereClause = "WHERE {$column} = '{$value}'";
        return $this;
    }
}