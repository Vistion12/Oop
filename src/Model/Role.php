<?php

namespace Vistion\Oop\Model;

class Role extends Model
{
    protected ?int $id;
    protected ?string $roleName;
    protected array $props=[
        'id'=>false,
        'roleName'=>true,
    ];


    public function __construct(string $roleName=null)
    {

        $this->roleName = $roleName;
    }


    protected static function getTableName(): string
    {
        return 'roles';
    }

}