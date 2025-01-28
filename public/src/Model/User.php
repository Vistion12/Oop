<?php

namespace Vistion\Oop\Model;

use Vistion\Oop\Core\Db;

class User extends Model
{
    public ?int $id;
    public ?string $name;
    protected static function getTableName(): string
    {
        return 'users';
    }

}