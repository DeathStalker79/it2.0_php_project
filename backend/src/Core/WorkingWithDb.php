<?php

namespace It20Academy\App\Core;
use It20Academy\App\Controllers\PostsController;
use It20Academy\App\Core\Db;
use PDO;

class WorkingWithDb
{
//   private array $errors = [];
//   public function store() : array
//    {
//        $postControl = new PostsController();
//        $request = new Request();
//        $title = $_POST ['title'] ?? null;
//        $author = $_POST['author'] ?? null;
//        $status = $_POST['status'] ?? null;
//        $category = $_POST['category'] ?? null;
//        $img = $_POST['img'] ?? null;
//        $content = $_POST['content'] ?? null;
//
//        if ($request->required($title) == false) {
//            $this->errors['title'][] = 'Не заполнен title';
//        }
//        if ($request->required($author) == false) {
//            $this->errors['author'][] = 'Не заполнен author';
//        }
//        if ($request->required($author) == false) {
//            $this->errors['status'][] = 'Не заполнен status';
//        }
//        if ($request->required($author) == false) {
//            $this->errors['category'][] = 'Не заполнен category';
//        }
//        if ($request->required($author) == false) {
//            $this->errors['img'][] = 'Не заполнен img';
//        }
//        if ($request->required($author) == false) {
//            $this->errors['content'][] = 'Не заполнен content';
//        }
//        if (count($this->errors)) {
//            $postControl->create();
//            die();
//        }
//
//        $dbh = (new Db())->getHandler();
//        $stmt = $dbh->prepare('INSERT INTO `posts` (`id`, `title`, `author_id`, `status_id`, `category_id`, `img`, `content`) VALUES ( NULL, :title, :author, :status, :category, :img, :content)');
//        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
//        $stmt->bindParam(':author', $author, PDO::PARAM_INT);
//        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
//        $stmt->bindParam(':category', $category, PDO::PARAM_INT);
//        $stmt->bindParam(':img', $img, PDO::PARAM_STR);
//        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
//
//        $stmt->execute();
//        $postControl->index();
//    }

//
//    public function Read($sql)
//    {
//        $sql_read = 'SELECT * FROM posts';
//        $dbh = (new Db())->getHandler();
//        $stmt = $dbh->query($sql_read);
//        $data = $stmt->fetchAll();
//        return $data;
//    }
//
//
//    public function Delete($sql_delete)
//    {
//        $dbh = (new Db())->getHandler();
//        $sql_delete = 'DELETE * from posts WHERE  id=:id';
//        $title = $_POST['id_db'];
//        $stmt = $this->$dbh->prepare($sql_delete);
//        $stmt->bindValue(':id_db', $title);
//        $stmt->execute();
//        return $stmt->rowCount();
//    }
//
//    public function Update($sql_update)
//    {
//        $id = $_POST['id_db'];
//        $author = $_POST['authors_id'];
//        $title = $_POST['title'];
//        $content = $_POST['content'];
//        $status = $_POST['status_id'];
//        $categories = $_POST['categories_id'];
//        $img = $_POST['img'];
//
//
//        if (empty($id)) {
//            echo 'Вы не задали id';
//            return;
//        }
//
//        $update_columns = array();
//        if (trim($author) !== "") {
//            $update_columns[] = "authors_id = :author";
//        }
//        if (trim($title) !== "") {
//            $update_columns[] = "title = :title";
//        }
//        if (trim($content) !== "") {
//            $update_columns[] = "content = :content";
//        }
//        if (trim($status) !== "") {
//            $update_columns[] = "status_id = :status_id";
//        }
//        if (trim($img) !== "") {
//            $update_columns[] = "img = :img";
//        }
//
//        if (sizeof($update_columns > 0)) {
//            $dbh = (new Db())->getHandler();
//            $sql = "UPDATE posts SET " . implode(", ", $update_columns) . " WHERE id=:id ";
//            $statement = $dbh->prepare($sql);
//
//        }
//        $statement->bindParam(":id", $id_db);
//        if (trim($title) !== "") {
//            $statement->bindParam(":title", $title);
//        }
//        if (trim($author) !== "") {
//            $statement->bindParam(":author", $author_id);
//        }
//        if (trim($content) !== "") {
//            $statement->bindParam(":content", $content);
//        }
//        if (trim($status) !== "") {
//            $statement->bindParam(":status", $status_id);
//        }
//        if (trim($img) !== "") {
//            $statement->bindParam(":img", $img);
//        }
//
//        // Выполняем запрос.
//        $statement->execute();
//
//        echo "Запись c ID: " . $id_db . " успешно обновлена!";
//    }
}