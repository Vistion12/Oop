<?php

namespace Vistion\Oop\Model;


abstract class Model extends DbModel
{
    protected array $props = [];

    public function __get(string $name): mixed
    {
        if (array_key_exists($name, $this->props)) {
            return $this->$name;
        }
        throw new \Exception("Нет такого поля");

    }

    public function __set(string $name, $value): void
    {
        if (array_key_exists($name, $this->props)) {
            $this->props[$name] = true;
            $this->$name = $value;
        }

    }

}