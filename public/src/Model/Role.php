<?php

namespace Vistion\Oop\Model;

class Role extends Model
{
    public int $id;
    public string $roleName;


    public function __construct(string $roleName=null)
    {

        $this->roleName = $roleName;
    }


    protected static function getTableName(): string
    {
        return 'roles';
    }

}