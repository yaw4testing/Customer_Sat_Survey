<?php
require "db_connection.php";

//session_start();

if(isset($_POST['formSubmit'])){
    form_validation($_POST,$db_connection);
}

//creating session for all input elements

//creating function to get user inputs
function form_validation($param,$connection){



    $product_service = $param['product_service']  ?? null;

//    var_dump($product_service);
//    exit();
    $lastTimeCalled = $param['lastTimeCalled']  ?? null;
    $timesCalledForTechSup = $param['timesCalledForTechSup']  ?? null;
    $natureOfSupport = $param['natureOfSupport']  ?? null;
    $howImpressed = $param['howImpressed']  ?? null;
    $likelyToRecomend =$param['likelyToRecomend']  ?? null;
    //$satFeedBack = $param['satFeedBack']  ?? null;
    //$durationOfProductUsage = $param['durationOfProductUsage'];
    $easeOfUsage = $param['easeOfUsage']  ?? null;
    $waitingTime = $param['waitingTime']  ?? null;
    $howSatisfied = $param['howSatisfied']  ?? null;
    //$service =$param['service'];
   // $innovation=$param['innovation'];
    //$teamSpirit = $param['teamSpirit'];

    //validating how long customer have used a product or service
    if(isset($product_service)&& !empty($product_service)){
            $product_service_validation_error ='';
    }
    else{
        $product_service_validation_error = "Please select one or two options";
    }

    //validating the last time customer called for support
    if(isset($lastTimeCalled) && !empty($lastTimeCalled)){
        $lastTimeCalled_validation_error ='';
    }
    else{
        $lastTimeCalled_validation_error = "Please select one or two options";
    }

    //validating how often does a customer call for support
    if(isset($timesCalledForTechSup) && !empty($timesCalledForTechSup)){
        $timesCalledForTechSup_validation_error='';
    }
    else{
        $timesCalledForTechSup_validation_error = "Please select one or two options";
    }

    //validating nature of support given
    if(isset($natureOfSupport) && !empty($natureOfSupport)){
        $natureOfSupport_validation_error='';
    }
    else{
        $natureOfSupport_validation_error= "please select an option";
    }

    //validating how likely a customer would recommend a service or product
    if(isset($likelyToRecomend)&& !empty($likelyToRecomend)){
        $likelyToRecomend_validation_error='';

    }
    else{
        $likelyToRecomend_validation_error= "please select an option";
    }

//    // validating how a long customer have used a product
//    if(isset($durationOfProductUsage)&& !empty($durationOfProductUsage)){
//        $durationOfProductUsage_validation_error = '';
//    }
//    else{
//        $durationOfProductUsage_validation_error = "please select an option";
//    }

    //validating the usability of a product or service
    if(isset($easeOfUsage)&& !empty($easeOfUsage)){
        $easeOfUsage_validation_error = '';
    }
    else{
        $easeOfUsage_validation_error =  "please select an option";
    }

    //validating the waiting time for customer to be given support
    if(isset($waitingTime)&& !empty($waitingTime)){
        $waitingTime_validation_error = '';
    }
    else{
        $waitingTime_validation_error =  "please select an option";
    }

    //validating the level of customer's satisfaction
    if(isset($howSatisfied)&& !empty($howSatisfied)){
        $howSatisfied_validation_error = '';
    }
    else{
        $howSatisfied_validation_error =  "please select an option";
    }
    if(isset($param) && !empty($param)){
        customer_data_processing($connection);
    }


}

function customer_data_processing($_connection){

    $product_service = $_POST['product_service'] ?? Null ;
    $lastTimeCalled = $_POST['lastTimeCalled'] ?? Null;
    $timesCalledForTechSup = $_POST['timesCalledForTechSup'] ?? Null;
    $natureOfSupport = $_POST['natureOfSupport'] ?? Null;
    $howImpressed = $_POST['howImpressed'] ?? Null;
    $likelyToRecomend =$_POST['likelyToRecomend'] ?? Null;
    $satFeedBack = $_POST['satFeedBack'] ?? Null;
    //$durationOfProductUsage = $_POST['durationOfProductUsage'];
    $easeOfUsage = $_POST['easeOfUsage'] ?? Null;
    $waitingTime = $_POST['waitingTime'] ?? Null;
    $howSatisfied = $_POST['howSatisfied'] ?? Null;
    $service =$_POST['service'] ?? Null;
    $innovation=$_POST['innovation'] ?? Null;
    $teamSpirit = $_POST['teamSpirit'] ?? Null;

    //insert statement
    $query_statement = "INSERT INTO customer_response(product_service,lastTimeCalled,timesCalledForTechSup,
natureOfSupport,howImpressed,likelyToRecomend,satFeedBack,easeOfUsage,
waitingTime,howSatisfied,service,innovation,teamSpirit) VALUES('$product_service','$lastTimeCalled',
'$timesCalledForTechSup','$natureOfSupport','$howImpressed','$likelyToRecomend','$satFeedBack',
'$easeOfUsage','$waitingTime','$howSatisfied','$service',
'$innovation','$teamSpirit')";

    if( $_connection->query($query_statement)===True){
        echo "customer survey response successfully added";

    }
    else{
        echo "Error:". $query_statement ."<br>" . $_connection->error;
    }

}


