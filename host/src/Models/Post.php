<?php

namespace It20Academy\App\Models;

class Post
{
    private $title;
    private $author;
    private $status;
    private $category;
    private $img;
    private $content;

    public static function all() : array
    {
        $db = require_once  (__DIR__ . '/../../storage/db.php');

        $posts = isset($db['posts']) ? $db['posts'] : [];

        return array_map(function($initialPost){
            $post = new self; // $post = new Post;

            $post->setTitle($initialPost['title']);
            $post->setAuthor($initialPost['author']);
            $post->setStatus($initialPost['status']);
            $post->setCategory($initialPost['category']);
            $post->setImg($initialPost['img']);
            $post->setContent($initialPost['content']);

            return $post;
        }, $posts);
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setStatus(string $status): void
    {
        $this->author = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setCategory(string $category): void
    {
        $this->author = $category;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setImg(string $img): void
    {
        $this->author = $img;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setContent(string $content): void
    {
        $this->author = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}