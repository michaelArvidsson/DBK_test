<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOMTENS DATABAS 2020</title>
  <style>
    body {
      background: rgba(76, 175, 80);
      background-image: url(christmas-decoration.png);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      margin: 0px;
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

    #selectf {
      width: 200px;
      margin: auto;
    }

    #input {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    #content {
      background: rgba(76, 175, 80, 0.8);
      width: 400px;
      margin: 20px;
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
  <div id='header'>
    <h1 id='phead'>TOMTENS DATABAS 2020</h1>
  </div>
  <?php

  //Function to debug 
  /* function debug($o)
  {
    echo '<pre>';
    print_r($o);
    echo '</pre>';
  }

  debug($_POST);*/

  $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009');



  ?>
  <div class="flex-container">
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
  </div>
</body>

</html>