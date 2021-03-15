<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "password";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    function getDataFromDatabase($connection, $sql) {
      $statement = $connection->prepare($sql);
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      return $statement->fetchAll();
    }

    function getDataFromSinglePost($connection, $sql) {
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetch();
    }

    function insertIntoDB($connection, $sql) {
        $statement = $connection->prepare($sql);
        $statement->execute();
        return;
    }
?>