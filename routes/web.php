<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add(
  'news',
  new Route(
    constant('URL_SUBFOLDER') . '/news',
    array(
      'controller' => 'NewsController',
      'method' => 'index'
    )
  )
);

$routes->add(
  'news_show',
  new Route(
    constant('URL_SUBFOLDER') . '/news/{id}',
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
    constant('URL_SUBFOLDER') . '/news/create',
    array(
      'controller' => 'NewsController',
      'method' => 'create'
    ),
    array('id' => '[0-9]+')
  )
);

$routes->add(
  'news_update',
  new Route(
    constant('URL_SUBFOLDER') . '/news/update',
    array(
      'controller' => 'NewsController',
      'method' => 'update'
    ),
    array('id' => '[0-9]+')
  )
);

$routes->add(
  'news_delete',
  new Route(
    constant('URL_SUBFOLDER') . '/news/delete',
    array(
      'controller' => 'NewsController',
      'method' => 'delete'
    ),
    array('id' => '[0-9]+')
  )
);

$routes->add(
  'comments',
  new Route(
    constant('URL_SUBFOLDER') . '/comments',
    array(
      'controller' => 'CommentsController',
      'method' => 'index'
    )
  )
);

$routes->add(
  'comments_show',
  new Route(
    constant('URL_SUBFOLDER') . '/comments/{id}',
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
    constant('URL_SUBFOLDER') . '/comments/create',
    array(
      'controller' => 'CommentsController',
      'method' => 'create'
    ),
    array('id' => '[0-9]+')
  )
);

$routes->add(
  'comments_update',
  new Route(
    constant('URL_SUBFOLDER') . '/comments/update',
    array(
      'controller' => 'CommentsController',
      'method' => 'update'
    ),
    array('id' => '[0-9]+')
  )
);

$routes->add(
  'comments_delete',
  new Route(
    constant('URL_SUBFOLDER') . '/comments/delete',
    array(
      'controller' => 'CommentsController',
      'method' => 'delete'
    ),
    array('id' => '[0-9]+')
  )
);