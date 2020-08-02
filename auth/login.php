<?php
session_start();
require_once '../db_connection.php';

//because there is no user sign up form, we prin the hash code in the browser and copied it to the database
$hashPassword= password_hash("hello", PASSWORD_DEFAULT);

//var_dump($hashPassword);
//exit();
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

        $getTableInfo = $connection->query("select * from login where  username='$username'");
        //$getTableInfo = $connection->query("show tables");
        $count = $getTableInfo->num_rows;


        if($count ==1)

        {       $results = $getTableInfo->fetch_assoc();
                $password_hash = $results['password'];
              // var_dump( $hashPassword=$getTableInfo->fetch_assoc());
//               // exit();

               if(password_verify($password,$password_hash)){
                  // header("location:login.php");
                   echo "login successful";
               }

               else{
                   echo "password invalid";
               }
        }





          else {
              $field_error="invalid username or password";
              $_SESSION['field_error']=$field_error;
              header("location: index.php");

          }
    }
}
