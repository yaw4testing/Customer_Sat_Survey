<?php
//this file creates mysqli connection string to the mysql database.
$host = "localhost";
$database = "customer_survey";
$username = "root";
$password = "";
$port     = "3306";

$db_connection = new mysqli($host,$username,$password,$database,$port);
        if($db_connection->connect_error){
            die("connection failed: ". $db_connection->connect_error);
        }