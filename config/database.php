<?php

$dbHost = "localhost";
$dbName = "bookshopDb";
$dbUser = "root";
$dbPass = "";

$dbMode = "remote";

if($dbMode == "remote"){

    $dbHost = "bdmnt4lojlwmhmh84sde-mysql.services.clever-cloud.com";
    $dbName = "bdmnt4lojlwmhmh84sde";
    $dbUser = "u6vfjlrvzxku2itk";
    $dbPass = "INrp9Hw0vOOgd77X6w9Z";
    echo  "conectado remoto";
}

try {
    $conn = new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);

        CreateTableUsers($conn, $dbName);
        CreateTableBooks($conn, $dbName);
   
} catch (Exception $err) {
    echo "error: " . $err->getMessage();
}

function CreateTableBooks($conn, $dbName){

    $query = 'SELECT table_name FROM information_schema.tables
                WHERE table_schema = "'.$dbName.'" AND table_name = "books"';

    if(!$conn->query($query)->fetchColumn()){
        $query = $conn->prepare("Create table books (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title varchar(100) NOT NULL,
        author varchar(100) NOT NULL,
        image varchar(100) NOT NULL,
        category varchar(100) NOT NULL,
        publication_date date NOT NULL,
        rating int(11) NOT NULL
        )");

        $query->execute();
        
        BooksMockData($conn);

    }
}

function CreateTableUsers($conn, $dbName){

    $query = 'SELECT table_name FROM information_schema.tables
                WHERE table_schema = "'.$dbName.'" AND table_name = "users"';

    if(!$conn->query($query)->fetchColumn()){
        $query = $conn->prepare("Create table users (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username varchar(100) NOT NULL,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        password varchar(100) NOT NULL,
        role varchar(100) NOT NULL
        )");

        $query->execute();

        UsersMockData($conn);

    }
}

function UsersMockData($conn){
    
    $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('hectoristy', 'hector', 'hectoristy1@gmail.com', '123456', 'admin')");
    
    $query->execute();

    $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('fulano', 'fulano', 'fulano@gmail.com', '123456', 'user')");

    $query->execute();

    $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('mengano', 'mengano', 'mengano@gmail.com', '123456', 'user')");

    $query->execute();

   $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('meleno', 'meleno', 'meleno@gmail.com', '123456', 'user')");
        
}

function BooksMockData($conn){
 
  $query = $conn->prepare("INSERT INTO books(title, author, image, category, publication_date, rating) 
  VALUES ('Php Basico', 'Fulano De Tal', 'php.jpg', 'programacion', '19-08-1996', '5')");	
 
  $query->execute();
 
  $query = $conn->prepare('"INSERT INTO books(title, author, image, category, publication_date, rating) 
  VALUES("Node Js", "Meleno Torres", "Nodejs.jpg", "Programacion", "05-06-2005", "4")');
  
  $query->execute();
  
  $query = $conn->prepare("INSERT INTO books(title, author, image, category, publication_date, rating) 
  VALUES ('Java Course', 'Mirita Barata', 'java.jpg', 'Programacion', '09-09-2008', '5')");
   
  $query->execute();
   
  $query = $conn->prepare("INSERT INTO books(title, author, image, category, publication_date, rating) 
  VALUES ('Html Course', 'Perencejo Pendejo', 'html.jpg', 'Programacion', '23-05-1990', '3')");
    
  $query->execute();
 
}

?>
