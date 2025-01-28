<?php

use Vistion\Oop\Controllers\PostsController;
use Vistion\Oop\Model\Category;
use Vistion\Oop\Model\Post;
use Vistion\Oop\Model\Role;
include __DIR__ . "/../vendor/autoload.php";


// этот блок кода для проверки метода UPDATE
//try {
////$post = Post::getOne(1);
//$role = Role::getOne(1);
//if ($role) {
////    $post->title = 'Новое название поста';
////    $post->text = 'Обновленный текст поста';
//        $role->roleName = "director";
//
//    // Выполняем обновление в базе данных
//    $role->update();
//
//    echo "обновление успешно!";
//} else {
//    echo "не найдено!";
//}
//} catch (\Exception $e) {
//    echo $e->getMessage();  // "Запись в поле 'id' запрещена."
//}




$controllerName = $_GET["c"] ?? 'posts';
$actionName = $_GET["a"] ?? 'index';

$controllerClass = "Vistion\\Oop\\Controllers\\"  . ucfirst($controllerName) . "Controller";;


if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "Нет такого контроллера";
}
DIE();



//$category = new Category("туризм");
//
//
//$category->insert();
//
//print_r($category);
//
//die();
///**@var Category $category*/
//$category = Category::getOne(1);
//
//print_r($category->getAll());

//$post = new Post(" мой Заголовок", "мой пост");
//
//// Вставка поста в базу данных
//$post->insert();
//print_r($post);
//
//// Получение всех постов
//$allPosts = Post::getAll();
//print_r($allPosts);

// $role = new Role("Manager");
// $role->insert();
// print_r($role);
// $allRoles = Role::getAll();
// print_r($allRoles);
// Получаем и выводим пользователя с ID 5
//print_r($user->getOne(5));
//
//// Получаем и выводим все посты
//$allPosts = $post->getAll();
//print_r($allPosts);
//
//// Получаем и выводим все роли
//$allRoles = $role->getAll();
//print_r($allRoles);
//
//// Получаем и выводим все категории
//$allCategories = $category->getAll();
//print_r($allCategories);
//
//// Получаем и выводим все комментарии
//$allComments = $comment->getAll();
//print_r($allComments);


// Получаем пользователя с именем 'alex'
//$result = $user->query()->where('name', 'alex')->getAll();
//print_r($result);