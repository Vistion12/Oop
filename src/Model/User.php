<?php

namespace Vistion\Oop\Model;

use Vistion\Oop\Core\Db;

class User extends Model
{
    public ?int $id;
    public ?string $name;
    protected array $props=[
        'id'=>false,
        'name'=>true,

    ];
    protected static function getTableName(): string
    {
        return 'users';
    }

}