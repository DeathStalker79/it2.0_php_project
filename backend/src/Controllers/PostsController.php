<?php

namespace It20Academy\App\Controllers;

use It20Academy\App\Core\Db;
use It20Academy\App\Core\Request;
use It20Academy\App\Core\View;
use It20Academy\App\Models\Authors;
use It20Academy\App\Models\Category;
use It20Academy\App\Models\Post;
use It20Academy\App\Models\Statuses;
use PDO;

class PostsController
{
    private array $errors = [];

    public function index()
    {
        $posts = Post::filteredPost();
        $categories = Category::allCategories();
        $authors = Authors::allAuthors();
        $statuses = Statuses::allStatuses();

        echo View::render('posts-index', compact('posts', 'authors', 'statuses', 'categories'));
    }

    public function create()
    {
        $posts = Post::all();
        $categories = Category::allCategories();
        $authors = Authors::allAuthors();
        $statuses = Statuses::allStatuses();
        $errors = $this->errors;

        echo View::render('posts-create', compact('posts', 'authors', 'statuses', 'categories', 'errors'));
    }

    public function store()
    {
        $request = new Request();
        $title = $_POST ['title'] ?? null;
        $author = $_POST['author'] ?? null;
        $status = $_POST['status'] ?? null;
        $category = $_POST['category'] ?? null;
        $img = $_POST['img'] ?? null;
        $content = $_POST['content'] ?? null;
        if ($request->required($title) == false) {
            $this->errors['title'][] = 'Не заполнен title';
        }
        if ($request->required($author) == false) {
            $this->errors['author'][] = 'Не заполнен author';
        }
        if ($request->required($author) == false) {
            $this->errors['status'][] = 'Не заполнен status';
        }
        if ($request->required($author) == false) {
            $this->errors['category'][] = 'Не заполнен category';
        }
        if ($request->required($author) == false) {
            $this->errors['img'][] = 'Не заполнен img';
        }
        if ($request->required($author) == false) {
            $this->errors['content'][] = 'Не заполнен content';
        }
        if (count($this->errors)) {
            $this->create();
            die();
        }

        $dbh = (new Db())->getHandler();
        $stmt = $dbh->prepare('INSERT INTO `posts` (`id`, `title`, `author_id`, `status_id`, `category_id`, `img`, `content`) VALUES ( NULL, :title, :author, :status, :category, :img, :content)');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':category', $category, PDO::PARAM_INT);
        $stmt->bindParam(':img', $img, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);

        $stmt->execute();
        $this->index();
    }

    public function show()
    {
        $id = $this->getIdFromUrl();

        $categories = Category::allCategories();
        $authors = Authors::allAuthors();
        $statuses = Statuses::allStatuses();
        $errors = $this->errors;
        $post = Post:: findId($id);
        echo View::render('post-show', compact( 'post', 'authors', 'categories', 'statuses', 'errors'));
    }

    public function update()
    {
        $id = $this->getIdFromUrl();

        $request = new Request();
        $title = $_POST ['title'] ?? null;
        $author = $_POST['author'] ?? null;
        $status = $_POST['status'] ?? null;
        $category = $_POST['category'] ?? null;
        $img = $_POST['img'] ?? null;
        $content = $_POST['content'] ?? null;

        if ($request->required($title) == false) {
            $this->errors['title'][] = 'Не заполнен title';
        }
        if ($request->required($author) == false) {
            $this->errors['author'][] = 'Не заполнен author';
        }
        if ($request->required($status) == false) {
            $this->errors['status'][] = 'Не заполнен status';
        }
        if ($request->required($category) == false) {
            $this->errors['category'][] = 'Не заполнен category';
        }
        if ($request->required($img) == false) {
            $this->errors['img'][] = 'Не заполнен img';
        }
        if ($request->required($content) == false) {
            $this->errors['content'][] = 'Не заполнен content';
        }
        if (count($this->errors)) {
            $this->show();
            die();
        }

        $dbh = (new Db())->getHandler();
        $stmt = $dbh->prepare('UPDATE `posts` SET title= :title, author_id= :author, status_id =:status, category_id = :category, img = :img, content = :content WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':category', $category, PDO::PARAM_INT);
        $stmt->bindParam(':img', $img, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);

        $stmt->execute();
        $this->index();
    }

//    public function delete()
//    {
//        $posts = Post::all();
//        $categories = Category::allCategories();
//        $authors = Authors::allAuthors();
//        $statuses = Statuses::allStatuses();
//        $errors = $this->errors;
//
//        echo View::render('posts-delete', compact('posts', 'authors', 'statuses', 'categories', 'errors'));
//    }

    public function delete()
    {
        $id = $this->getIdFromUrl();
//dd($id);
//        dd($_POST);
        $dbh = (new Db())->getHandler();
        $stmt = $dbh->prepare('DELETE FROM `posts` WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->table();
    }
    public function table()
    {
        $posts = Post::all();
        $categories = Category::allCategories();
        $authors = Authors::allAuthors();
        $statuses = Statuses::allStatuses();

        echo View::render('posts-table', compact('posts', 'authors', 'statuses', 'categories'));
    }
    public function read(){
        $dbh = (new Db())->getHandler();
        $stmt = $dbh->prepare('SELECT * FROM `posts`');

        $stmt->execute();
        $this->index();
    }

    /**
     * @return mixed|string
     */
    public function getIdFromUrl()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode("/", $url);
        $id = $url[count($url) - 1];

        return $id;
    }
}