<?php
namespace App\Controllers;

use App\Model\Comment;

class CommentController
{
  protected $comment;
  public function __construct()
  {
    $this->comment = new Comment();
  }

  public function index($routes, $request)
  {
    $commentRecords = $this->comment->all();

    require_once '../views/comment/lists.php';
  }

  public function show(int $id, $routes, $request)
  {
    $commentDetail = $this->comment->find($id);

    require_once '../views/comments/details.php';
  }

  public function create($routes, $request) 
  {
    $commentDetail = $this->comment->create([
      'title' => $request->input('title'),
      'body' => $request->input('body')
    ]);

    require_once '../views/comments/details.php';
  }

  public function update(int $id, $routes, $request) 
  {
    $this->comment->update($id, [
      'title' => $request->input('title'),
      'body' => $request->input('body')
    ]);

    $commentDetail = $this->comment->find($id);

    require_once '../views/comments/details.php';
  }

  public function delete(int $id, $routes, $request) 
  {
    $this->comment->delete($id);

    require_once '../views/comments/lists.php';
  }
}