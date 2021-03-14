<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;
use PDO;

class Filters
{
    public int $id;
    public int $detailId;
    public string $name;
    public array $variables;
    public string $createdAt;
    public string $updatedAt;


    public static function allFilters($id): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->prepare('select * from filters WHERE detail_id = :id');
//        dd($statement);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $initialFilters = $statement->fetchAll();

        return array_map(function ($initialFilter) {
            $filter = new self;
            $filter->setFiltersId($initialFilter['id']);
            $filter->setFiltersDetailId($initialFilter['detail_id']);
            $filter->setFiltersName($initialFilter['name']);
            $filter->setFiltersVariables($initialFilter['variables']);
            $filter->setFiltersCreatedAt($initialFilter['created_at']);
            $filter->setFiltersUpdatedAt($initialFilter['updated_at']);

            return $filter;
        }, $initialFilters);
    }

    public function setFiltersName(string $name): void
    {
        $this->name = $name;
    }

    public function getFiltersName(): string
    {
        return $this->name;
    }

    public function getFiltersId(): int
    {
        return $this->id;
    }

    public function setFiltersId(int $id): void
    {
        $this->id = $id;
    }

    public function getFiltersDetailId(): int
    {
        return $this->detailId;
    }

    public function setFiltersDetailId(int $detailId): void
    {
        $this->detailId = $detailId;
    }

    public function setFiltersVariables(string $variables): void
    {
        $this->variables = json_decode($variables);
    }

    public function getFiltersVariables(): array
    {
        return $this->variables;
    }

    public function setFiltersCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getFiltersCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setFiltersUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getFiltersUpdatedAt(): string
    {
        return $this->updatedAt;
    }

}
