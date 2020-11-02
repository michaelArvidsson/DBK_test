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
        /* 
        echo '<pre>';
        print_r($_POST);
        echo '</pre>'; */


        $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009');
        if (isset($_POST['Verktyg'])) {
          $query = 'SELECT * FROM Verktygsvy WHERE VerktygsID=:VerktygsID;';
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
      <form id='selectf' action="Reponse_2_DBK2020.php" method="post">
        <div>
          <input type='text' name='Verktyg' placeholder=" Search Verktyg" />
          <input id="input" style='margin-top:5px;' type='submit' name='submitbutton' value='Search'>
        </div>
      </form>

      <form id='selectf' action="Reponse_DBK2020.php" method="post">
        <div>
          <input id="input" type="submit" value="Visa alla">
        </div>
      </form>
    </div>
  </div>
  <div id="content">
    <h2 style='text-align:center;'> Registera nytt verktyg</h2>
    <form id='selectf' action="insert_verktyg.php" method="post">
      VerktygsID: <input type="text" name="VerktygsID" /><br>
      Verktygskod: <input type="text" name="VerktygsKod" /><br>
      Verktygsnamn: <input type="text" name="VNamn" /><br>
      Pris: <input type="text" name="Pris" /><br>
      Magistatus: <input type="text" name="Magistatus" /><br>
      Beskrivning: <input type="text" name="Beskrivning" /><br>
      <input id='input' type="submit" />
      <input type="reset">
    </form>
  </div>
</body>

</html>