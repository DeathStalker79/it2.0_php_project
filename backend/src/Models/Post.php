<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;
use PDO;
class Post
{
    private int $id;
    private string $title;
    private int $author;
    private int $status;
    private int $category;
    private string $img;
    private string $content;

    public static function all() : array
    {
        $dbh = (new Db())->getHandler();
//        dd($dbh);
        $statement = $dbh->query('select * from posts');
        $initialPosts = $statement->fetchAll();

        return array_map(function($initialPost){
            $post = new self; // $post = new Post;
            $post->setId($initialPost['id']);
            $post->setTitle($initialPost['title']);
            $post->setAuthor($initialPost['author_id']);
            $post->setStatus($initialPost['status_id']);
            $post->setCategory($initialPost['category_id']);
            $post->setImg($initialPost['img']);
            $post->setContent($initialPost['content']);


            return $post;
        }, $initialPosts);
    }

    public static function findId($id): array
    {
        $dbh = (new Db())->getHandler();
        $stmt = $dbh->prepare('SELECT * FROM `posts` WHERE id=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $post = $stmt->fetch();
//        dd($post);
        return $post;

    }

    public static function filteredPost()
    {
        $posts = self::all();

        return array_filter($posts, function($post){
            if(($post->getStatus()-1) === 0){
                return $post;
            }
        });
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setAuthor(int $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): int
    {
        return $this->author;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
    function cutContent(int $maxsymbol= 200){
        $str = self::getContent();
        if ($maxsymbol < mb_strlen($str)) {
            $str = mb_substr($str,0,$maxsymbol-3).'...';
        }
        return $str;
    }

    private function transliteration($str): string
    {
        $alphabet = [
            'а'=>'a',    'б'=>'b',    'в'=>'v',    'г'=>'g',    'д'=>'d',
            'е'=>'e',    'ё'=>'e',    'ж'=>'j',    'з'=>'z',    'и'=>'i',
            'й'=>'y',    'к'=>'k',    'л'=>'l',    'м'=>'m',    'н'=>'n',
            'о'=>'o',    'п'=>'p',    'р'=>'r',    'с'=>'s',    'т'=>'t',
            'у'=>'u',    'ф'=>'f',    'х'=>'h',    'ц'=>'c',    'ч'=>'ch',
            'ш'=>'sh',   'щ'=>'shch', 'ы'=>'y',    'э'=>'e',    'ю'=>'yu',
            'я'=>'ya',   'ъ'=>'',     'ь'=>''
        ];
        $str = strtr($str, $alphabet);
        return $str;
    }

    public function slag($str) {
        $str = mb_strtolower($str);
        $str = str_replace(" ", "-", (self::transliteration($str)));
        return $str;
    }
}