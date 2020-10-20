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

    #phead {
      text-align: center;
      letter-spacing: 10px;
      margin-top: 10px;
    }

    #selectf {
      width: 200px;
      margin: auto;
    }

    #input {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    #content {
      background-color: greenyellow;
      width: 400px;
      margin: auto;
      margin-top: 20px;
      box-shadow: 0px 0px 10px 2px;
    }
  </style>
</head>

<body>
  <h1 id='phead'>TOMTENS DATABAS 2020</h1>
  <?php

  // Function to debug 
  function debug($o)
  {
    echo '<pre>';
    print_r($o);
    echo '</pre>';
  }

  debug($_POST);

  echo '<ul>';
  $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009');

  foreach ($pdo->query('SELECT * FROM Verktyg;') as $row) {
    echo '<li>' . $row['VerktygsID'] . ' ' . $row['Namn'] . ' ' . $row['Pris'] . ' ' . $row['Magistatus'] . '</li>';
  }
  echo '</ul>';

  ?>
  <div id="content">
    <h3 style="text-align: center;">Välj verktyg</h3>
    <form id='selectf' action="Reponse_DBK2020.php" method="post">

      <select size='1' name='Verktyg'>
        <?php
        foreach ($pdo->query('SELECT * FROM Verktygsvy;') as $row) {
          echo '<option value=' . $row['VerktygsID'] . ' >' . $row['VNamn'] . '</option>';
        }
        ?>
      </select>
      <div id="input">
        <input type="submit" value="Visa Info">
        <input type="reset">
      </div>
    </form>
  </div>

  <div id="content">
    <h3 style="text-align: center;">Välj leksak</h3>
    <form id='selectf' action="Reponse_DBK2020_leksak.php" method="post">

      <select size='1' name='leksak'>
        <?php
        foreach ($pdo->query('SELECT * FROM Leksak;') as $row) {
          echo '<option value=' . $row['LeksaksID'] . ' >' . $row['Namn'] . '</option>';
        }
        ?>
      </select>
      <div id="input">
        <input type="submit" value="Visa Info">
        <input type="reset">
      </div>
    </form>
  </div>
</body>

</html>