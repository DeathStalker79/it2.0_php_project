<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Category
{
    private int $id;
    private string $name;

    public static function allCategories(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from categories');
        $initialCategories = $statement->fetchAll();

        return array_map(function ($initialCategory) {
            $category = new self;
            $category->setCutId($initialCategory['id']);
            $category->setCutName($initialCategory['name']);


            return $category;
        }, $initialCategories);
    }

    public function setCutName(string $name): void
    {
        $this->name = $name;
    }

    public function getCutName(): string
    {
        return $this->name;
    }

    public function getCutId(): int
    {
        return $this->id;
    }

    public function setCutId(int $id): void
    {
        $this->id = $id;
    }

}
