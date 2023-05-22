<?php
namespace App\Model;

use App\Utils\DB;
use Exception;

class News extends BaseModel
{
  protected $table = 'news';

  public function model()
  {
    return News::class;
  }

  protected $id, $title, $body, $createdAt;

  public function fillables()
  {
    return [
      'title',
      'body'
    ];
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setBody($body)
  {
    $this->body = $body;

    return $this;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  public function create(array $params)
  {
    $fillables = $this->fillables();

    $stmt = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES (:title, :body, :created_at)";
    $stmt = $this->db->pdo->prepare($stmt);
    foreach ($params as $key => $value) {
      if (!in_array($key, $fillables)) {
        throw new Exception("The field '{$key}' is not declared.");
      }

      $stmt->bindParam(":{$key}", $value);
    }
    $stmt->bindParam(":created_at", date('Y-m-d H:i:s'));
    $stmt->execute();

    return $this->find($this->db->pdo->lastInsertId());
  }

  public function update(int $id, array $params)
  {
    $fillables = $this->fillables();

    $stmt = "UPDATE `news` set `title` = :title, `body` = :body WHERE id = :id";
    $stmt = $this->db->pdo->prepare($stmt);
    foreach ($params as $key => $value) {
      if (!in_array($key, $fillables)) {
        throw new Exception("The field '{$key}' is not declared.");
      }
      
      $stmt->bindParam(":{$key}", $value);
    }
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $this->find($this->db->pdo->lastInsertId());
  }
}