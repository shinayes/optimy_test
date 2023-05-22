<?php
namespace App\Model;

use App\Utils\DB;
use App\Contracts\ModelContract;
use Exception;
use PDO;

abstract class BaseModel implements ModelContract
{
  /**
   * @var BaseModel
   */
  protected $model = null;
  protected $table;
  protected $db;

  protected $fillables = [];

  public function __construct()
  {
    $this->db = new DB;
  }

  abstract public function model();
  abstract public function fillables();
  abstract public function create(array $params);
  abstract public function update(int $id, array $params);
  public function delete(int $id)
  {
    $stmt = "DELETE FROM {$this->getTable()} WHERE id = :id";
    $stmt = $this->db->pdo->prepare($stmt);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->rowCount();
  }

  /**
   * Get the model table name
   *
   * @return mixed
   */
  public function getTable()
  {
    return $this->table;
  }

  /** Get all records from the table */
  public function all($columns = ['*'])
  {
    $columnsString = implode(',', $columns);

    //TODO::should provide limit for pagination
    $rows = $this->db->select("SELECT {$columnsString} FROM {$this->getTable()}");

    $records = [];
    foreach ($rows as $row) {
      $model = new $this();

      switch ($model::class) {
        case News::class:
          $records[] = $model->setId($row['id'])
            ->setTitle($row['title'])
            ->setBody($row['body'])
            ->setCreatedAt($row['created_at']);

          break;

        case Comment::class:
          $records[] = $model->setId($row['id'])
            ->setTitle($row['title'])
            ->setBody($row['body'])
            ->setCreatedAt($row['created_at'])
            ->setNewsId($row['news_id']);

          break;
      }
    }

    return $records;
  }

  public function findAllBy(string $column, $param)
  {
    //TODO::should provide limit for pagination
    $stmt = "SELECT * FROM {$this->getTable()} WHERE {$column} = :val ORDER BY created_at ASC";
    $stmt = $this->db->pdo->prepare($stmt);
    $stmt->bindParam(':val', $param);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $records = [];
    foreach ($rows as $row) {
      $model = new $this();

      switch ($model::class) {
        case News::class:
          $records[] = $model->setId($row['id'])
            ->setTitle($row['title'])
            ->setBody($row['body'])
            ->setCreatedAt($row['created_at']);

          break;

        case Comment::class:
          $records[] = $model->setId($row['id'])
            ->setTitle($row['title'])
            ->setBody($row['body'])
            ->setCreatedAt($row['created_at'])
            ->setNewsId($row['news_id']);

          break;
      }
    }

    return $records;
  }

  /** Find a record from the table by ID */
  public function find(int $id)
  {
    $stmt = "SELECT * FROM {$this->getTable()} WHERE id = :id";
    $stmt = $this->db->pdo->prepare($stmt);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch();

    return $row;
  }

  /** Find a record from the table by specific column */
  public function findBy(string $column, $param)
  {
    $stmt = "SELECT * FROM {$this->getTable()} WHERE {$column} = :val ORDER BY created_at ASC";
    $stmt = $this->db->pdo->prepare($stmt);
    $stmt->bindParam(':val', $param);
    $stmt->execute();
    $row = $stmt->fetch();

    return $row;
  }

  /** Find a last record from the table by specific column */
  public function findLastBy(string $column, $param)
  {
    $stmt = "SELECT * FROM {$this->getTable()} WHERE {$column} = :val ORDER BY created_at DESC";
    $stmt = $this->db->pdo->prepare($stmt);
    $stmt->bindParam(':val', $param);
    $stmt->execute();
    $row = $stmt->fetch();

    return $row;
  }
}