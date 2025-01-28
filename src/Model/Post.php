<?php

//TODO 1. реализовать Update для всех моделей

namespace Vistion\Oop\Model;
class Post extends Model
{
    protected ?int $id=null;
    protected ?string $title;
    protected ?string $text;
    protected ?int $id_category;
    protected array $props=[
            'id'=>false,
            'title'=>true,
            'text'=>true,
            'id_category'=>true,
        ];

    public function __construct(string $title=null, string $text=null, int $id_category=null)
    {

        $this->title = $title;
        $this->text = $text;
        $this->id_category = $id_category;
    }

    protected static function getTableName(): string
    {
        return 'posts';
    }
}