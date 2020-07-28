<?php
require "db_connection.php";

//session_start();

if(isset($_POST['formSubmit'])){
    form_validation($_POST,$db_connection);
    customer_data_processing($db_connection);
}

//creating session for all input elements

//creating function to get user inputs
function form_validation($param,$connection){
    $product_service =$param['product_service'];
    $lastTimeCalled = $param['lastTimeCalled'];
    $timesCalledForTechSup = $param['timesCalledForTechSup'];
    $natureOfSupport = $param['natureOfSupport'];
    $howImpressed = $param['howImpressed'];
    $likelyToRecomend =$param['likelyToRecomend'];
   // $satFeedBack = $param['satFeedBack'];
    //$durationOfProductUsage = $param['durationOfProductUsage'];
    $easeOfUsage = $param['easeOfUsage'];
    $waitingTime = $param['waitingTime'];
    $howSatisfied = $param['howSatisfied'];
    //$service =$param['service'];
   // $innovation=$param['innovation'];
    //$teamSpirit = $param['teamSpirit'];

    //validating how long customer have used a product or service
    if(isset($product_service)&& !empty($product_service)){
            $product_service_validation_error ='';
    }
    else{
        echo "Please select one or two options";
    }

    //validating the last time customer called for support
    if(isset($lastTimeCalled) && !empty($lastTimeCalled)){
        $lastTimeCalled_validation_error ='';
    }
    else{
        echo "Please select one or two options";
    }

    //validating how often does a customer call for support
    if(isset($timesCalledForTechSup) && !empty($timesCalledForTechSup)){
        $timesCalledForTechSup_validation_error='';
    }
    else{
        echo "Please select one or two options";
    }

    //validating nature of support given
    if(isset($natureOfSupport) && !empty($natureOfSupport)){
        $natureOfSupport_validation_error='';
    }
    else{
        echo "please select an option";
    }

    //validating how likely a customer would recommend a service or product
    if(isset($likelyToRecomend)&& !empty($likelyToRecomend)){
        $likelyToRecomend_validation_error='';

    }
    else{
        echo "please select an option";
    }

//    // validating how a long customer have used a product
//    if(isset($durationOfProductUsage)&& !empty($durationOfProductUsage)){
//        $durationOfProductUsage_validation_error = '';
//    }
//    else{
//        echo "please select an option";
//    }

    //validating the usability of a product or service
    if(isset($easeOfUsage)&& !empty($easeOfUsage)){
        $easeOfUsage_validation_error = '';
    }
    else{
        echo "please select an option";
    }

    //validating the waiting time for customer to be given support
    if(isset($waitingTime)&& !empty($waitingTime)){
        $waitingTime_validation_error = '';
    }
    else{
        echo "please select an option";
    }

    //validating the level of customer's satisfaction
    if(isset($howSatisfied)&& !empty($howSatisfied)){
        $howSatisfied_validation_error = '';
    }
    else{
        echo "please select an option";
    }


}

function customer_data_processing($db_connection){

    $product_service =$_POST['product_service'];
    $lastTimeCalled = $_POST['lastTimeCalled'];
    $timesCalledForTechSup = $_POST['timesCalledForTechSup'];
    $natureOfSupport = $_POST['natureOfSupport'];
    $howImpressed = $_POST['howImpressed'];
    $likelyToRecomend =$_POST['likelyToRecomend'];
    $satFeedBack = $_POST['satFeedBack'];
    //$durationOfProductUsage = $_POST['durationOfProductUsage'];
    $easeOfUsage = $_POST['easeOfUsage'];
    $waitingTime = $_POST['waitingTime'];
    $howSatisfied = $_POST['howSatisfied'];
    $service =$_POST['service'];
    $innovation=$_POST['innovation'];
    $teamSpirit = $_POST['teamSpirit'];

    //insert statement
    $query_statement = "INSERT INTO customer_response(product_service,lastTimeCalled,timesCalledForTechSup,
natureOfSupport,howImpressed,likelyToRecomend,satFeedBack,easeOfUsage,
waitingTime,howSatisfied,service,innovation,teamSpirit) VALUES('$product_service','$lastTimeCalled',
'$timesCalledForTechSup','$natureOfSupport','$howImpressed','$likelyToRecomend','$satFeedBack',
'$easeOfUsage','$waitingTime','$howSatisfied','$service',
'$innovation','$teamSpirit')";

    if( $db_connection->query($query_statement)===True){
        echo "customer survey response successfully added";

    }
    else{
        echo "Error:". $query_statement ."<br>" . $db_connection->error;
    }

}


