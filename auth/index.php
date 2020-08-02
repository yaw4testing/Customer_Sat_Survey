<?php
session_start();
$error_message = $_SESSION['field_error'] ?? null;

?>

<html>
<head>
    <body style="background-color: azure">
<form method="post" action="login.php">
    <div class="col-md-offset-5 col-md-4" style="margin-top: 10%">

        <?php  echo  !empty($error_message) ? '<div class="alert alert-danger" role="alert" style="margin-left: 40%; border-radius: 5px;
 padding-top: 10px; height: 30px; background: linear-gradient(80deg,lightgoldenrodyellow,gray); background-color: coral; margin-right: 40%; margin-bottom: 20px; text-align: center;">'.$error_message.'</div>' : null  ?>
<div style="background-color: coral; margin-left: 40%; margin-right: 40%; padding-left: 20px; padding-top:10px;
padding-bottom: 10px; border-radius: 10px; background: linear-gradient(80deg,lightgoldenrodyellow,gray);" >

    <p>Welcome back, Please Login</p>
    <p><input type="text" class="userClass" name ="username" placeholder="Username"></p>
    <p><input type="password" class="passClass" name="password" placeholder="Password"></p>
    <button type="submit">Login</button>

</div>



</form>
</body>
</head>
</html>



