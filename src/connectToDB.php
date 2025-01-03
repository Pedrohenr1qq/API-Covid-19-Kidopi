<?php 
  $hostname = $_ENV['DB_HOST'];
  $dbname = $_ENV['DB_DATABASE'];
  $user= $_ENV['DB_USER'];
  $password= $_ENV['DB_PASSWORD'];

  $conn = new mysqli($hostname, $user, $password, $dbname);
  if ($conn->connect_error){
    echo "DB connection failed: " .  $conn->connect_error;
    exit;
  }

  function getLastAcess($conn){
    //Check if table exists
    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      $sql = "SELECT * FROM acessLogs ORDER BY id DESC LIMIT 1";
      $result = $conn->query($sql);
  
      if($result->num_rows > 0){
        return $result->fetch_assoc();
      }
    }
  }

  function insertNewLog($conn, $countryName){
    //Check if table exists
    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    if($result->num_rows == 0){
      //Create table if don't exists;
      $createTale = "CREATE TABLE acessLogs (id INT PRIMARY KEY AUTO_INCREMENT, country VARCHAR(150), logAcess DATETIME DEFAULT CURRENT_TIMESTAMP)";
      if($conn->query($createTale) === FALSE){
        echo "Error in create table: " . $conn->error;
        exit;
      }
    }else{
      $sql = "INSERT INTO acessLogs (country) VALUES(?)";
      $prepared = $conn->prepare($sql);
      $prepared->bind_param("s", $countryName);

      if($prepared->execute() === FALSE){
        echo "Error in insert values: " . $prepared->error;
        exit;
      }
      $prepared->close();
    }
  }

?>