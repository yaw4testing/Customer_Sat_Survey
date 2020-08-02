<?php
session_start();
require_once '../db_connection.php';
process_data($db_connection);
function process_data($connection){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $field_error = null;



    if(empty($username) || empty($password)){
        $field_error = "Please enter user name or password";
        $_SESSION['field_error']=$field_error;
        header('location:index.php');
    }

    else{
        //$getTableInfo = $connection->query("SELECT * FROM login WHERE username ='$username' and password='$password'");
        $getTableInfo = $connection->query("show tables");
       var_dump($getTableInfo);
       exit();
        $count = $getTableInfo->num_rows;

        if($count >1){
           while ($row = $getTableInfo->fetch_assoc($count)){
               echo "login successful";
           }


        }

          else {
              echo "Error: " . $getTableInfo . "<br>" . "0 results";

          }
    }
}
