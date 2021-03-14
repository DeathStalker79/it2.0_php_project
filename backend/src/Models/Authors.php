<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Authors
{
    private int $id;
    private string $name;

    public static function allAuthors(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from authors ORDER BY name');
        $initialAuthors = $statement->fetchAll();

        return array_map(function ($initialAuthor) {
            $author = new self;
            $author->setAuthorId($initialAuthor['id']);
            $author->setAuthorName($initialAuthor['name']);

            return $author;
        }, $initialAuthors);
    }

    public function setAuthorName(string $name): void
    {
        $this->name = $name;
    }

    public function getAuthorName(): string
    {
        return $this->name;
    }

    public function getAuthorId(): int
    {
        return $this->id;
    }

    public function setAuthorId(int $id): void
    {
        $this->id = $id;
    }

    function getShortFio() {
        $str = self::getAuthorName();
        $m = explode(' ', $str);
        $str = $m[0] . ' ' . substr($m[1],0,1) . '.';
        return $str;
    }

}