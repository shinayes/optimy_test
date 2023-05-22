<?php

use App\Lib\Config;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add(
  'news',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/news',
    array(
      'controller' => 'NewsController',
      'method' => 'index'
    )
  )
);

$routes->add(
  'news_show',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/news/{id}',
    array(
      'controller' => 'NewsController',
      'method' => 'show'
    ),
    array('id' => '[0-9]+')
  )
);

$routes->add(
  'news_create',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/news/create',
    array(
      'controller' => 'NewsController',
      'method' => 'create'
    ),
    array(),
    array(),
    '',
    array(),
    array('post')
  )
);

$routes->add(
  'news_update',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/news/update',
    array(
      'controller' => 'NewsController',
      'method' => 'update'
    ),
    array(),
    array(),
    '',
    array(),
    array('put')
  )
);

$routes->add(
  'news_delete',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/news/delete',
    array(
      'controller' => 'NewsController',
      'method' => 'delete'
    ),
    array(),
    array(),
    '',
    array(),
    array('delete')
  )
);

$routes->add(
  'comments',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/comments',
    array(
      'controller' => 'CommentsController',
      'method' => 'index'
    )
  )
);

$routes->add(
  'comments_show',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/comments/{id}',
    array(
      'controller' => 'CommentsController',
      'method' => 'show'
    ),
    array('id' => '[0-9]+')
  )
);

$routes->add(
  'comments_create',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/comments/create',
    array(
      'controller' => 'CommentsController',
      'method' => 'create'
    ),
    array(),
    array(),
    '',
    array(),
    array('post')
  )
);

$routes->add(
  'comments_update',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/comments/update',
    array(
      'controller' => 'CommentsController',
      'method' => 'update'
    ),
    array(),
    array(),
    '',
    array(),
    array('put')
  )
);

$routes->add(
  'comments_delete',
  new Route(
    Config::get('URL_SUBFOLDER', 'optimy_test') . '/comments/delete',
    array(
      'controller' => 'CommentsController',
      'method' => 'delete'
    ),
    array(),
    array(),
    '',
    array(),
    array('delete')
  )
);