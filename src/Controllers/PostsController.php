<?php

namespace Vistion\Oop\Controllers;

use Vistion\Oop\Model\Post;

class PostsController
{
    public function runAction($action)
    {
        $method = "action" . ucfirst($action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404 нет такого Action";
        }

    }

    public function actionIndex()
    {
        $posts = Post::getAll();

        echo $this->renderTemplate('index', [
            'posts' => $posts
        ]);
    }

    public function actionPost()
    {
        // Получаем ID из параметров URL
        $id = (int)$_GET['id'];

        // Ищем пост с таким ID в базе данных
        $post = Post::getOne($id);

        // Если пост не найден, показываем ошибку
        if (!$post) {
            echo "Пост не найден!";
            return;
        }

        // Отображаем шаблон с данными поста
        echo $this->renderTemplate('post', [
            'title' => $post->title,
            'text' => $post->text
        ]);
    }

    public function renderTemplate($template, $params = []): string
    {
        ob_clean();
        extract($params);
        include '../src/views/' . $template . ".php";
        return ob_get_clean();
    }
}