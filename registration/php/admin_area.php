 <?php
ob_start();
include 'dbconn.php';
if(isset($_REQUEST['logout'])){
     session_unset();
     session_destroy();
     header('Location:../../login/index.php');
}
if(isset($_SESSION['login'])){
    if($_SESSION["login"]=="start"){
        $sql = "select * from events";
        $result = $conn->query($sql); 
    }
 else {
    die("<h1 color='red'>INVALID ACCESS2</h1>");
    //echo $_SESSION['login'];
    }
}
 else {
    die("<h1 color='red'>INVALID ACCESS3</h1>"); 
    // echo $_SESSION['login'];
}
?>
<html>
    <head>
        <title>Events Registration</title>
        <style>
            table,td,th{
                border:1px solid black;
                border-collapse: collapse;
            }
            table.eventsTable,.eventsTable td,.eventsTable th{
                border : 1px solid black;
                border-collapse: collapse;
            }
            td,th{
                padding: 10px 5px;
            }
            *{
/*                border: 1px solid black;*/
            }
        </style>
    </head>
    <body>
        <h3>Please Select Your Event and Hit Submit...</h3>
        <form target="" method="GET">
            <table width="400px">
                <tr>
                    <td>
                        <h3 style="text-align: center;">EVENT NAME?:</h3>

                        <select name="ename" style="padding: 15px 5px;">
                            <?php
                            while($row = $result->fetch_assoc()){
                                echo '<option>'.$row['event_name'].'</option>';
                            } 
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="submit" value="SUBMIT" name='register'/>
                    </td>
                </tr>
            </table>
        </form>
        <h3 style="color:lightblue;text-align: left;padding-right: 50px;"><a href="admin_area.php?logout=1">LOGOUT</a></h3>
        <?php
            if(isset($_REQUEST['register'])){
                if(isset($_REQUEST['ename'])){
                    $ename=$_REQUEST['ename'];
                    $sql="select * from registrations where event_name='$ename'";
                    $result = $conn->query($sql);
                }
            }
        ?>
        <table class="eventsTable">
            <tr>
                <th>sr_no</th>
                <th>fname</th>
                <th>lname</th>
                <th>team_name</th>
                <th>email</th>
                <th>phone</th>
                <th>gender</th>
                <th>college_name</th>
                <th>city</th>
                <th>event_type</th>
                <th>event_name</th>
                <th>registration_id</th>
            </tr>
            <?php
            if(isset($_REQUEST['register'])){
                while($row = $result->fetch_assoc()){
                    echo '<tr>'.
                            '<td>'.$row['sr_no'].'</td>'.
                            '<td>'.$row['fname'].'</td>'.
                            '<td>'.$row['lname'].'</td>'.
                            '<td>'.$row['team_name'].'</td>'.
                            '<td>'.$row['email'].'</td>'.
                            '<td>'.$row['phone'].'</td>'.
                            '<td>'.$row['gender'].'</td>'.
                            '<td>'.$row['college_name'].'</td>'.
                            '<td>'.$row['city'].'</td>'.
                            '<td>'.$row['event_type'].'</td>'.
                            '<td>'.$row['event_name'].'</td>'.
                            '<td>'.$row['registration_id'].'</td>'
                        .'</tr>';
                }
            }
            ?>
        </table>
    </body>
</html>
