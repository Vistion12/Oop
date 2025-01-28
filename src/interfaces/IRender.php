<?php

namespace Vistion\Oop\interfaces;

interface IRender
{
    public function renderTemplate($template, $params = []);
}