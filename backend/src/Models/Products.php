<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;
use PDO;

class Products
{
    public int $id;
    public string $imgSource;
    public string $name;
    public int $code;
    public string $rate;
    public array $description;
    public string $price;
    public int $watt;
    public int $power;
    public int $detailId;
    public string $createdAt;
    public string $updatedAt;

    public static function allProducts($id,$filters,$price): array
    {
        $dbh = (new Db())->getHandler();
//        dd($filters);
        $query = 'select * from products Products WHERE detail_id=:id';
        if (is_array($filters)){
            foreach ($filters as $group){

                foreach ($group as $key => $filter ){
                    if($key == 0){
                        $query.=' AND '.(count($group)>1 ? '(' : '' ).'json_contains(`description`, '.json_encode(json_encode(['text'=>$filter['name']])).')';
                    }else {
                        $query.=' OR json_contains(`description`, '.json_encode(json_encode(['text'=>$filter['name']])).')'.($key==count($group)-1 ? ')': '');
                    }
                }
            }
        }
        if(is_array($price)){
            $query.= ' AND price BETWEEN :min_price AND :max_price';
        }
        $statement = $dbh->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        if(is_array($price)){
            $statement->bindParam(':min_price', $price['min']);
            $statement->bindParam(':max_price', $price['max']);
        }
        $statement->execute();
        $initialProducts = $statement->fetchAll();

        return array_map(function ($initialProduct) {
            $product = new self;
            $product->setProductsId($initialProduct['id']);
            $product->setProductsImgSource($initialProduct['img_source']);
            $product->setProductsName($initialProduct['name']);
            $product->setProductsCode($initialProduct['code']);
            $product->setProductsRate($initialProduct['rate']);
            $product->setProductsId($initialProduct['id']);
            $product->setProductsDescription($initialProduct['description']);
            $product->setProductsPrice($initialProduct['price']);
            $product->setProductsWatt($initialProduct['watt']);
            $product->setProductsPower($initialProduct['power']);
            $product->setProductsDetailId($initialProduct['detail_id']);
            $product->setProductsCreatedAt($initialProduct['created_at']);
            $product->setProductsUpdatedAt($initialProduct['updated_at']);

            return $product;
        }, $initialProducts);
    }

    public function setProductsName(string $name): void
    {
        $this->name = $name;
    }

    public function getProductsName(): string
    {
        return $this->name;
    }

    public function getProductsId(): int
    {
        return $this->id;
    }

    public function setProductsId(int $id): void
    {
        $this->id = $id;
    }

    public function getProductsDetailId(): int
    {
        return $this->detailId;
    }

    public function setProductsDetailId(int $detailId): void
    {
        $this->detailId = $detailId;
    }

    public function setProductsDescription(string $description): void
    {
        $this->description = json_decode($description);
    }

    public function getProductsDescription(): array
    {
        return $this->description;
    }

    public function setProductsCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getProductsCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setProductsUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getProductsUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setProductsImgSource(string $imgSource): void
    {
        $this->imgSource = $imgSource;
    }

    public function getProductsImgSource(): string
    {
        return $this->imgSource;
    }

    public function setProductsRate(string $rate): void
    {
        $this->rate = $rate;
    }

    public function getProductsRate(): string
    {
        return $this->rate;
    }

    public function setProductsPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getProductsPrice(): string
    {
        return $this->price;
    }

    public function getProductsCode(): int
    {
        return $this->code;
    }

    public function setProductsCode(int $code): void
    {
        $this->code = $code;
    }

    public function getProductsWatt(): int
    {
        return $this->watt;
    }

    public function setProductsWatt(int $watt): void
    {
        $this->watt = $watt;
    }

    public function getProductsPower(): int
    {
        return $this->power;
    }

    public function setProductsPower(int $power): void
    {
        $this->power = $power;
    }

}