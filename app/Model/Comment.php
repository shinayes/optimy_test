<?php
namespace App\Model;
use Exception;

class Comment extends BaseModel
{
  public $table = 'comments';

  public function model()
  {
    return Comment::class;
  }

  protected $id, $body, $createdAt, $newsId;

  public function fillables()
  {
    return [
      'body',
      'news_id'
    ];
  }

  public function getId()
  {
    return $this->id;
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

  public function getNewsId()
  {
    return $this->newsId;
  }

  public function setNewsId($newsId)
  {
    $this->newsId = $newsId;

    return $this;
  }

  public function create(array $params)
  {
    $fillables = $this->fillables();

    $stmt = "INSERT INTO `comments` (`body`, `created_at`, `news_id`) VALUES (:body, :created_at, :news_id)";
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

    $stmt = "UPDATE `comments` set `news_id` = :news_id, `body` = :body WHERE id = :id";
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