<?php
$servername = "localhost";
$database = "petshop";
$username = "root";
$password = "";

$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try { 
    $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
    echo "Connected successfully";
  } catch (PDOException $error) {
    echo 'Connection error: ' . $error->getMessage();
  }

$name = $_POST['tnome'];
$senha = $_POST['tsenha'];
$email = $_POST['tMail'];
$texto = $_POST['tTipomsg'];

 
$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO Forn (name, senha, email, texto) VALUES (:name, :senha, :email, :texto)");

$my_Insert_Statement->bindParam(':name', $name);
$my_Insert_Statement->bindParam(':senha', $senha);
$my_Insert_Statement->bindParam(':email', $email);
$my_Insert_Statement->bindParam(':texto', $texto);

$my_Insert_Statement->execute();

if ($my_Insert_Statement->execute()) {
    echo "New record created successfully";
  } else {
    echo "Unable to create record";
  }


?>