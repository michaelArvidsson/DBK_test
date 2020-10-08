<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOMTENS DATABAS 2020</title>
</head>

<body>
  <h1>TOMTENS DATABAS 2020</h1>
  <?php

      // Function to debug 
      function debug($o){
      echo '<pre>';
      print_r($o);
      echo '</pre>';
      }


      $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009')

      foreach ($pdo->query('SELECT * FROM Verktyg;') as $row) {
      debug($row);
      }


  ?>
</body>
</html>