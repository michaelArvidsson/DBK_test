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
  <div style="background-color: greenyellow; width:500px; margin:auto">
    <form action="DBK_test.php" method="post">

      <h3>Välj verktyg</h3>
      <select size='1' name='Verktyg'>
        <?php
        foreach ($pdo->query('SELECT * FROM Verktyg;') as $row) {

          echo '<option value=' . $row['Namn'] . ' >' . $row['VerktygsID'] . '</option>';
        }


        ?>
      </select>
      <input type="submit" value="Visa Magistatus">

    </form>
  </div>
</body>

</html>