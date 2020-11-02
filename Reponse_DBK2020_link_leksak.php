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
    <table>
      <?php
      $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009');
      foreach ($pdo->query('SELECT * FROM Leksak;') as $row) {
        echo "<tr>
      <td>";
        echo "<a href='Reponse_DBK2020_leksak.php?LeksaksID=" . urlencode($row[' LeksaksID']) . "'>Verktyg: " . $row['LeksaksID'] . "</a>";
        echo "</td>
    </tr>";
      }
      ?>
    </table>
  </div>
</body>

</html>