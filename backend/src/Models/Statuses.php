<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Statuses
{
    private int $id;
    private string $name;

    public static function allStatuses(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from statuses');
        $initialStatuses = $statement->fetchAll();

        return array_map(function ($initialStatus) {
            $status = new self;
            $status->setStatusId($initialStatus['id']);
            $status->setStatusName($initialStatus['name']);


            return $status;
        }, $initialStatuses);
    }

    public function setStatusName(string $name): void
    {
        $this->name = $name;
    }

    public function getStatusName(): string
    {
        return $this->name;
    }

    public function getStatusId(): int
    {
        return $this->id;
    }

    public function setStatusId(int $id): void
    {
        $this->id = $id;
    }

}
