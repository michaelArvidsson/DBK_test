<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOMTENS DATABAS 2020</title>
  <style>
    body {
      background-color: greenyellow;
      background-image: url(christmas-decoration.png);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
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
      background: rgba(76, 175, 80, 0.8);
      width: 400px;
      margin: auto;
      margin-top: 20px;
      box-shadow: 0px 0px 10px 2px;
      padding-bottom: 50px;
    }

    #header {
      width: 600px;
      background-color: red;
      color: white;
      margin: auto;
    }
  </style>
</head>

<body>
  <div id=header>
    <h1 id='phead'>TOMTENS DATABAS 2020</h1>
  </div>
  <div id='content'>
    <table border='1'>
      <?php

      echo '<pre>';
      print_r($_POST);
      echo '</pre>';


      $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009');
      if (isset($_POST['Verktyg'])) {
        $verk = '%' . $_POST['Verktyg'] . '%';
        $query = 'SELECT * FROM Verktygsvy WHERE VNamn LIKE :VNamn;';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('VNamn', $verk);
        $stmt->execute();
        echo "<tr><th>ID</th><th>Namn</th><th>Pris</th><th>Magistatus</th>";
        foreach ($stmt as $key => $row) {
          echo "<tr>";
          echo "<td>" . $row['VerktygsID'] . "</td>";
          echo "<td>" . $row['VNamn'] . "</td>";
          echo "<td>" . $row['Pris'] . "</td>";
          echo "<td>" . $row['Magistatus'] . "</td>";
          echo "</tr>";
        }
      } else {
        $query = 'SELECT * FROM Verktygsvy;';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('VerktygsID', $_POST['Verktyg']);
        $stmt->execute();
        echo "<tr><th>ID</th><th>Namn</th><th>Pris</th><th>Magistatus</th>";
        foreach ($stmt as $key => $row) {
          echo "<tr>";
          echo "<td>" . $row['VerktygsID'] . "</td>";
          echo "<td>" . $row['VNamn'] . "</td>";
          echo "<td>" . $row['Pris'] . "</td>";
          echo "<td>" . $row['Magistatus'] . "</td>";
          echo "</tr>";
        }
      }

      ?>
    </table>
    <form id='selectf' action="Reponse_DBK2020.php" method="post">
      <div>
        <input type='text' name='Verktyg' placeholder=" Search Verktyg" />
        <input type='submit' name='submitbutton' value='Search'>
      </div>
    </form>

    <form id='selectf' action="Reponse_DBK2020.php" method="post">
      <div id="input">
        <input type="submit" value="Visa alla">
      </div>
    </form>
  </div>
</body>

</html>