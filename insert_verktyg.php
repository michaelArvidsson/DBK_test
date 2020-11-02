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

  if (isset($_POST['VerktygsKod'])) {
    $querystring = 'INSERT INTO VerktygsNamn (VerktygsKod,VNamn) VALUES(:VerktygsKod,:VNamn);';
    $stmt = $pdo->prepare($querystring);
    $stmt->bindParam(':VerktygsKod', $_POST['VerktygsKod']);
    $stmt->bindParam(':VNamn', $_POST['VNamn']);
    $stmt->execute();
  }
  if (isset($_POST['VerktygsID'])) {
    $querystring = 'INSERT INTO Verktyg (VerktygsID,Pris,Magistatus) VALUES(:VerktygsID,:Pris,:Magistatus);';
    $stmt = $pdo->prepare($querystring);
    $stmt->bindParam(':VerktygsID', $_POST['VerktygsID']);
    $stmt->bindParam(':Pris', $_POST['Pris']);
    $stmt->bindParam(':Magistatus', $_POST['Magistatus']);
    $stmt->execute();
  }
  if (isset($_POST['Beskrivning'])) {
    $querystring = 'INSERT INTO Verktygsbeskrivning (Beskrivning) VALUES(:Beskrivning);';
    $stmt = $pdo->prepare($querystring);
    $stmt->bindParam(':Beskrivning', $_POST['Beskrivning']);
    $stmt->execute();
  }

  ?>

</body>

</html>

<!-- INSERT INTO VerktygsNamn,Verktyg,Verktygsbeskrivning
(VerktygsKod,VNamn,VerktygsID,Pris,Magistatus,Beskrivning)
VALUES(:VerktygsKod,:VNamn,:VerktygsID,:Pris,:Magistatus,:Beskrivning);';

if (isset($_POST['VerktygsID'])) {
$querystring = 'INSERT INTO VerktygsNamn (VerktygsKod,VNamn) VALUES(:VerktygsKod,:VNamn);';
$stmt = $pdo->prepare($querystring);
$stmt->bindParam(':VerktygsID', $_POST['VerktygsID']);
$stmt->bindParam(':VerktygsKod', $_POST['VerktygsKod']);
$stmt->bindParam(':VNamn', $_POST['VNamn']);
$stmt->bindParam(':Pris', $_POST['Pris']);
$stmt->bindParam(':Magistatus', $_POST['Magistatus']);
$stmt->bindParam(':Beskrivning', $_POST['Beskrivning']);
$stmt->execute();
} -->