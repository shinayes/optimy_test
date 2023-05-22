<?php

namespace App\Utils;

use App\Lib\Config;
use App\Model\BaseModel;
use PDO;

class DB
{
  public $pdo;

  public $columns = array();
  public $table;
  public $where;
  public $limit;
  public $query_elements = [' SELECT ', ' FROM ', ' WHERE ', ' LIMIT '];

  public function __construct()
  {
    $DATABASE_NAME = Config::get('DATABASE_NAME', 'phptest');
    $DATABASE_HOST = Config::get('DATABASE_HOST', '127.0.0.1');
    $DATABASE_USER = Config::get('DATABASE_USERNAME', 'root');
    $DATABASE_PASSWORD = Config::get('DATABASE_PASSWORD', '');

    $dsn = "mysql:dbname=$DATABASE_NAME;host=$DATABASE_HOST";

    $pdoOptions = [
      PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    $this->pdo = new \PDO($dsn, $DATABASE_USER, $DATABASE_PASSWORD, $pdoOptions);
  }

  public function select($sql)
  {
    $sth = $this->pdo->query($sql);
    return $sth->fetchAll();
  }

  public function from($table)
  {
      $this->table = $table;
      return $this;
  }
  public function where($where)
  {
      $this->where = $where;
      return $this;
  }
  public function limit($limit)
  {
      $this->limit = $limit;
      return $this;
  }

  public function exec($sql)
  {
    return $this->pdo->exec($sql);
  }

  public function lastInsertId()
  {
    return $this->pdo->lastInsertId();
  }
}