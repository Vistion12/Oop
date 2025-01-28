<?php

namespace Vistion\Oop\Model;

use Vistion\Oop\Core\Db;

class Post extends Model
{
    public ?int $id=null;
    public ?string $title;
    public ?string $text;


    public function __construct(string $title=null, string $text=null)
    {

        $this->title = $title;
        $this->text = $text;
    }

    protected static function getTableName(): string
    {
        return 'posts';
    }



}