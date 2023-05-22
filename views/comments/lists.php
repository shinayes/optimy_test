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
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>
  </head>

  <body>

    <section>
      <h1>Comments</h1>
      <table>
        <tr>
          <th>Title</th>
          <th>Body</th>
          <th>Comments</th>
        </tr>
        <?php foreach ($newsRecords as $record) { ?>
          <tr>
            <td>
              <?php echo $record->getTitle(); ?>
            </td>
            <td>
              <?php echo $record->getBody(); ?>
            </td>
            <td></td>
          </tr>
        <?php } ?>
      </table>
      <a href="<?php echo $routes->get('homepage')->getPath(); ?>">Back to homepage</a>
      <section>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
          integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

</html>