<?php

namespace App\Utils;
use App\Model\News;

class NewsManager
{
  protected $news;
  public function __construct() 
  {
    $this->news = new News();
  }

  // private static $instance = null;

  // public static function getInstance()
  // {
  //   if (null === self::$instance) {
  //     $c = __CLASS__;
  //     self::$instance = new $c;
  //   }
  //   return self::$instance;
  // }

  /**
   * list all news
   */
  public function index()
  {
    return $this->news->all();
  }

  public function show(int $id)
  {
    return $this->news->find($id);
  }

  /**
   * add a record in news table
   */
  public function addNews($title, $body)
  {
    $db = DB::getInstance();
    $sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES('" . $title . "','" . $body . "','" . date('Y-m-d') . "')";
    $db->exec($sql);
    return $db->lastInsertId($sql);
  }

  /**
   * deletes a news, and also linked comments
   */
  public function deleteNews($id)
  {
    $comments = CommentManager::getInstance()->listComments();
    $idsToDelete = [];

    foreach ($comments as $comment) {
      if ($comment->getNewsId() == $id) {
        $idsToDelete[] = $comment->getId();
      }
    }

    foreach ($idsToDelete as $id) {
      CommentManager::getInstance()->deleteComment($id);
    }

    $db = DB::getInstance();
    $sql = "DELETE FROM `news` WHERE `id`=" . $id;
    return $db->exec($sql);
  }
}