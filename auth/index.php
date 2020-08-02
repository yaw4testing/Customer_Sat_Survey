<?php
session_start();
$error_message = $_SESSION['field_error'] ?? null;

?>

<html>
<head>
    <body style="background-color: azure">
<form method="post" action="login.php">
    <div class="col-md-offset-5 col-md-4" style="margin-top: 10%">

        <?php  echo  $error_message ? '<div class="alert alert-danger" role="alert">'.$error_message.'</div>' : null  ?>
<div style="background-color: coral; margin-left: 40%; margin-right: 40%; padding-left: 20px; padding-top:10px;
padding-bottom: 10px;" >

    <p>Welcome back, Please Login</p>
    <p><input type="text" class="userClass" name ="username" placeholder="Username"></p>
    <p><input type="password" class="passClass" name="password" placeholder="Password"></p>
    <button type="submit">Login</button>

</div>



</form>
</body>
</head>
</html>



