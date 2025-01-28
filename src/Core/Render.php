<?php

namespace Vistion\Oop\Core;

use Vistion\Oop\interfaces\IRender;

class Render implements IRender
{
    public function renderTemplate($template, $params = []): string
    {
        ob_start();
        extract($params);
        include '../src/views/' . $template . ".php";
        return ob_get_clean();
    }
}