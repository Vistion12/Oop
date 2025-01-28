<?php

namespace Vistion\Oop\Controllers;

class ContactsController extends Controller
{
    public function actionIndex()
    {

        $message = "Привет, это страница контактов.";


        echo $this->render('contacts/index', [
            'message' => $message
        ]);
    }
}