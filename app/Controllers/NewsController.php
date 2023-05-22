<?php
namespace App\Controllers;

use App\Model\News;

class NewsController
{
  protected $news;
  public function __construct()
  {
    $this->news = new News();
  }

  public function index($routes, $request)
  {
    $newsRecords = $this->news->all();

    require_once '../views/news/lists.php';
  }

  public function show(int $id, $routes, $request)
  {
    $newsDetail = $this->news->find($id);

    require_once '../views/news/details.php';
  }

  public function create($routes, $request) 
  {
    $newsDetail = $this->news->create([
      'title' => $request->input('title'),
      'body' => $request->input('body')
    ]);

    require_once '../views/news/details.php';
  }

  public function update(int $id, $routes, $request) 
  {
    $this->news->update($id, [
      'title' => $request->input('title'),
      'body' => $request->input('body')
    ]);

    $newsDetail = $this->news->find($id);

    require_once '../views/news/details.php';
  }

  public function delete(int $id, $routes, $request) 
  {
    $this->news->delete($id);

    require_once '../views/news/lists.php';
  }
}