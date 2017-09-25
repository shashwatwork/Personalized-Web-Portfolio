<?php
ob_start();

include './php/dbconn.php';

$_POST = json_decode(file_get_contents('php://input'), true);
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $team = $_POST['team'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $college = $_POST['college'];
    $city = $_POST['city'];
    $etype = $_POST['etype'];
    $ename = $_POST['ename'];
   // echo "hello world";
    
    $sql = "INSERT INTO registrations VALUES ('','$fname','$lname','$team','$email','$mobile','$gender','$college','$city','$etype','$ename','')";
    //echo $sql;
    //die($sql);
    if ($conn->query($sql) === TRUE) {
           // $sql = "SELECT COUNT(*) AS COUNTS FROM registrations WHERE event_name='$ename';";
            $sql = "SELECT * FROM `registrations` WHERE event_name='$ename'";
            $result = $conn->query($sql);
            $count = $result->num_rows;
            $sql = "SELECT * FROM events WHERE event_name='$ename'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $max_count = $row["max"];
            $reg_amount= $row["amount"];
            $message="";
            
            $sql = "SELECT * FROM `registrations` WHERE `fname`='$fname' AND `lname`='$lname' AND `email`='$email' AND `phone`='$mobile' AND `event_type`='$etype' AND `event_name`='$ename' AND `college_name`='$college' AND `gender`='$gender'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $srno = $row["sr_no"];
            }
            
            if($max_count>=$count){
                $message=$ename."-CNF-".$count."-".$srno;
                $regType="CONFIRMED";
            }
            else{
                $message=$ename."-WT-".$count."-".$srno;
                $regType="WAITING DUE TO EXCESS REGISTRATIONS";
            }
            $sql = "UPDATE `registrations` SET `registration_id`='$message' WHERE `sr_no`='$srno'";
            $conn->query($sql);
            //echo $message;
            $post_data = array(
                'registration_id' => $message,
                'registration_amount' => $reg_amount,
                'regType' => $regType
                    );
           // echo "done here";
            echo json_encode($post_data, JSON_FORCE_OBJECT);
//          echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
//    print_r($data);
//    $post = json_decode($post);
//    echo $post;
    //echo $post->data->fname;
//    var_dump($_POST)
?>