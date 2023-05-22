<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="favicon.png">
  <title>News List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  </head>

  <body>
    <section>
      <h1>News Details</h1>
      <div class="container">
        <form action="/news/create">
          <label for="title">Title:</label><br>
          <input type="text" id="title" name="title" value="<?php echo $newsDetail['title'] ?>"><br>
          <label for="body">Body:</label><br>
          <input type="text" id="body" name="body" value="<?php echo $newsDetail['body'] ?>"><br><br>
          <input type="submit" value="Submit">
        </form>
        <a href="<?php echo $routes->get('homepage')->getPath(); ?>">Back to homepage</a>
        <section>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

</html>