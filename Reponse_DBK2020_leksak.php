<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOMTENS DATABAS 2020</title>
  <style>
    body {
      background-color: rgba(76, 175, 80);
      background-image: url(christmas-decoration.png);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      margin: 0px;
    }

    table {
      background-color: white;
      margin: auto;
      margin-top: 20px;
      width: 300px;
      text-align: center;
      font-weight: bolder;
      margin-bottom: 20px;
      border-collapse: collapse;
    }

    .flex-container {
      margin-top: 250px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
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
      padding-bottom: 10px;
    }

    #header {
      width: 600px;
      background-color: red;
      color: white;
      margin: auto;
    }

    #selectf {
      width: 200px;
      margin: auto;
    }

    #input {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <div id=header>
    <h1 id='phead'>TOMTENS DATABAS 2020</h1>
  </div>

  <div class="flex-container">
    <div id='content'>
      <table border='1'>
        <?php

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
        } else {
          $query = 'SELECT * FROM Leksak;';
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
        if (isset($_POST['LeksaksID'])) {
          $querystring = 'INSERT INTO Leksak (LeksaksID,Namn,Vikt,Pris) VALUES(:LeksaksID,:Namn,:Vikt,:Pris);';
          $stmt = $pdo->prepare($querystring);
          $stmt->bindParam(':LeksaksID', $_POST['LeksaksID']);
          $stmt->bindParam(':Namn', $_POST['Namn']);
          $stmt->bindParam(':Vikt', $_POST['Vikt']);
          $stmt->bindParam(':Pris', $_POST['Pris']);
          $stmt->execute();
        }

        ?>

      </table>
      <form id='selectf' action="Reponse_DBK2020_leksak.php" method="post">
        <div>
          <input id="input" type="submit" value="Visa alla">
        </div>
      </form>
    </div>

  </div>
  <div id="content">
    <h2 style='text-align:center;'> Registera ny leksak</h2>
    <form id='selectf' action="Reponse_DBK2020_leksak.php" method="post">
      LeksaksID: <input type="text" name="LeksaksID" /><br>
      Namn: <input type="text" name="Namn" /><br>
      Vikt: <input type="text" name="Vikt" /><br>
      Pris: <input type="text" name="Pris" /><br>
      <input id='input' type="submit" />
      <input type="reset">
    </form>
  </div>
</body>

</html>