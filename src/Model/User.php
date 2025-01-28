<?php

namespace Vistion\Oop\Model;

use Vistion\Oop\Core\Db;

class User extends Model
{
    protected ?int $id;
    protected ?string $name;

    protected array $props = [
        'id' => false,
        'name' => false,
    ];

    public static function getName()
    {
        return $_SESSION['login'] ?? false;
    }

    public static function isAdmin(): bool
    {
        return $_SESSION['login'] === 'admin';
    }

    protected static function getTableName():string
    {
        return 'users';
    }

}