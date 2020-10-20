<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOMTENS DATABAS 2020</title>
  <style>
    body {
      background-color: greenyellow;
      margin: 0px;
    }

    table {
      background-color: white;
      margin: auto;
      width: 300px;
      text-align: center;
      font-weight: bolder;
      margin-bottom: 20px;
      border-collapse: collapse;
    }

    #phead {
      text-align: center;
      letter-spacing: 10px;
      margin-top: 10px;
    }

    #content {
      background-color: greenyellow;
      width: 400px;
      margin: auto;
      margin-top: 20px;
      box-shadow: 0px 0px 10px 2px;
      padding-bottom: 50px;
    }
  </style>
</head>

<body>
  <h1 id='phead'>TOMTENS DATABAS 2020</h1>
  <div id='content'>
    <table border='1'>
      <?php

      echo '<pre>';
      print_r($_POST);
      echo '</pre>';

      $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009');
      if (isset($_POST['leksak'])) {
        $query = 'SELECT * FROM Leksak WHERE LeksaksID=:LeksaksID;';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('LeksaksID', $_POST['leksak']);
        $stmt->execute();
        echo "<tr><th>ID</th><th>Namn</th><th>Vikt</th><th>Pris</th>";
        foreach ($stmt as $key => $row) {
          echo "<tr>";
          echo "<td>" . $row['LeksaksID'] . "</td>";
          echo "<td>" . $row['Namn'] . "</td>";
          echo "<td>" . $row['Vikt'] . "</td>";
          echo "<td>" . $row['Pris'] . "</td>";
          echo "</tr>";
        }
      }

      ?>
    </table>
  </div>
</body>

</html>