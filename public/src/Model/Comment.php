<?php

namespace Vistion\Oop\Model;

class Comment extends Model
{
    public int $id;
    public int $user_id;
    public int $post_id;


    protected static function getTableName(): string
    {
        return 'comments';
    }
}