<?php

namespace Vistion\Oop\Model;

class Comment extends Model
{
    protected ?int $id;
    protected ?int $user_id;
    protected ?int $post_id;
    protected array $props=[
        'id'=>false,
        'user_id'=>true,
        'post_id'=>true,
    ];


    protected static function getTableName(): string
    {
        return 'comments';
    }
}