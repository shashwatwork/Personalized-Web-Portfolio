<?php
ob_start();

include './php/dbconn.php';
if(isset($_REQUEST['onStage'])){
    $sql="SELECT event_name FROM `events` WHERE event_type='ON_STAGE'";
}
elseif(isset ($_REQUEST['offStage'])){
    $sql = "SELECT * FROM `events` WHERE event_type='OFF_STAGE'";
}
else{
    die("UN AUTHORISED ACCESS");
}
    $result = $conn->query($sql);
    $return_arr=  array();
    while($row = $result->fetch_assoc()){
        array_push($return_arr,$row['event_name']);
    }
    echo json_encode($return_arr);
;
?>