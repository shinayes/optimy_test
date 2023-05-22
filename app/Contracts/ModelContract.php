<?php

namespace App\Contracts;

use phpDocumentor\Reflection\Types\Boolean;
use Exception;
use App\Model\BaseModel;

/**
 * Interface Repository
 * @package App\Contracts
 */
interface ModelContract
{
  /**
   * @return mixed
   */
  public function model();

  public function fillables();

  public function create(array $params);

  public function update(int $id, array $params);

  // /**
  //  * @param array $columns
  //  * @return mixed
  //  */
  // public function all($columns = array('*'));

  // /**
  //  * @param $id
  //  * @param array $columns
  //  * @param boolean $exclude
  //  * @return mixed
  //  */
  // public function find($id, $columns = array('*'));

  // /**
  //  * @param $attribute
  //  * @param $value
  //  * @param array $columns
  //  * @param boolean $exclude
  //  * @return mixed
  //  */
  // public function findBy($attribute, $value, $columns = array('*'));

  // /**
  //  * @param $attribute
  //  * @param $value
  //  * @param array $columns
  //  * @return mixed
  //  */
  // public function findLastBy($attribute, $value, $columns = array('*'));

  // /**
  //  * @param $attribute
  //  * @param $value
  //  * @param array $columns
  //  * @param boolean $exclude
  //  * @return mixed
  //  */
  // public function findAllBy(
  //   $attribute,
  //   $value,
  //   $columns = array('*'), $order_col = 'created_at', $order_setting = 'asc');

  // /**
  //  * Find a collection of models by the given query conditions.
  //  *
  //  * @param array $where
  //  * @param array $columns
  //  * @param array $group
  //  * @param bool $or
  //  *
  //  * @return \Illuminate\Database\Eloquent\Collection|null
  //  *
  //  * SAMPLE QUERIES:
  //  */
  // public function findWhere($where, $columns = ['*'], $group = [], $or = false);

  // /**
  //  * @param $join
  //  * @param $model
  //  * @return mixed
  //  */
  // public function buildJoin($join, $model);

  // /**
  //  * @return mixed
  //  */
  // public function getTable();

  // /**
  //  * @param array $params
  //  * @return mixed
  //  */
  // public function createNew(array $params);

  // /**
  //  * @param int $id
  //  * @param array $params
  //  * @return mixed
  //  */
  // public function update(int $id, array $params);

  // /**
  //  * @param int $id
  //  * @return mixed
  //  */
  // public function delete(int $id);

  // /**
  //  * @param int $id
  //  * @return bool
  //  */
  // public function verifyRecord(int $id): bool;

  // public function commitDatabase(): bool;

  // public function rollbackDatabase(): bool;
}