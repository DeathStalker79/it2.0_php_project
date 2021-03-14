<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;
use PDO;
class Post
{
    public int $id;
    public string $name;
    public string $type;
    public string $img;
    public string $description;
    public string $createdAt;
    public string $updatedAt;
    public string $productsCount;

//    public string $title;
//    public int $author;
//    public int $status;
//    public int $category;
//    public string $img;
//    public string $content;

    public static function all() : array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('SELECT details.*, COUNT(details.id) as products_count FROM `details` JOIN `products` ON details.id = products.detail_id GROUP BY details.id');
        $initialPosts = $statement->fetchAll();

        return array_map(function($initialPost){
            $post = new self; // $post = new Post;
            $post->setId($initialPost['id']);
            $post->setName($initialPost['name']);
            $post->setType($initialPost['type']);
            $post->setImg($initialPost['img']);
            $post->setDescription($initialPost['description']);
            $post->setCreatedAt($initialPost['created_at']);
            $post->setUpdatedAt($initialPost['updated_at']);
            $post->setProductsCount($initialPost['products_count']);


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
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setProductsCount(string $productsCount): void
    {
        $this->productsCount = $productsCount;
    }

    public function getProductsCount(): string
    {
        return $this->productsCount;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function getImg(): string
    {
        return $this->img;
    }

//    public function setContent(string $content): void
//    {
//        $this->content = $content;
//    }
//
//    public function getContent(): string
//    {
//        return $this->content;
//    }
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