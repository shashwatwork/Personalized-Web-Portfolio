<?php
ob_start();
/*$host = "localhost";
$dbUname = "root";
$dbPassword = "";
$dbName = "epignosis";
mysql_connect($host, $dbUname, $dbPassword) or die(mysql_error());
mysql_select_db($dbName) or die(mysql_error());
session_start();*/
include '../registration/php/dbconn.php';
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="college fest at the heritage academy epignosis 2k16">
        <meta name="keywords" content="the heritage academy;heritage;ruby;kolkata;february;college;fest;epignosis;epignosis2k16;epignosis;2016">
        <title>LOGIN</title>
        <style>
            *{
/*                border: 1px solid black;*/
            }
        </style>
    </head>
    <body>
        <form class="form" method="POST" action="">
                <input type="text" class="name" placeholder="User Name" name="uname" required="true">
                <div>
                    <p class="name-help">Please enter your User Name.</p>
                </div>
                <input type="password" class="email" placeholder="Password" name="pass" required="true">
                <div>
                    <p class="email-help">Please enter your current Password.</p>
                </div>
                <input type="submit" class="submit" value="LOGIN" name="login">
         </form>
    </body>
</html>
<?php
if(isset($_REQUEST['login'])){
    $email=$_REQUEST['uname'];
    $pass=md5($_REQUEST['pass']);
    if($email=="epignosis@heritage.in" && $pass==md5("heritage@2k16")){
        $_SESSION['login']="start";
        header("Location:../registration/php/admin_area.php");
    }
 else {
     echo "<h3 color='red;>INVAILD EMAIL/PASSWORD</h3>";   
    }
}
?>