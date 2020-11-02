<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOMTENS DATABAS 2020</title>
</head>

<body>


  <?php

  echo '<pre>';
  print_r($_POST);
  echo '</pre>';

  $pdo = new PDO('mysql:dbname=a18micar_dbk2020;host=localhost', 'sqllab', 'Tomten2009');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

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

</body>

</html>