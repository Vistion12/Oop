<?php

namespace Vistion\Oop\Model;


abstract class Model extends DbModel
{
    public function __get(string $name)
    {
        // Проверяем, можно ли читать это поле
        if (!isset($this->props[$name]) || !$this->props[$name]) {
            throw new \Exception("Чтение поля '$name' запрещено.");
        }
        return $this->$name;
    }
    public function __set(string $name, $value): void
    {
        // Проверяем, можно ли записывать в это поле
        if (!isset($this->props[$name]) || !$this->props[$name]) {
            throw new \Exception("Запись в поле '$name' запрещена.");
        }
        $this->$name = $value;
    }

}