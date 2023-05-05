<?php
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    //echo $username;

    //conncetion to data base
    $con = new mysqli("localhost","root","","user_details");
    if($con->connect_error){
        die("sorry: ".$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from login where NAME = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result-> fetch_assoc();
            if($data['PASSWORD'] === $password){
                //session_start('school_page.html');
                if($data['state'] == 'ADMIN'){
                    $myfile = fopen("school_page.html", "r") or die("Unable to open file!");
                    echo fread($myfile,filesize("school_page.html"));
                    fclose($myfile);
                }
                else if($data['state'] == 'SCHOOL'){
                        $myfile = fopen("school_user.html", "r") or die("Unable to open file!");
                        echo fread($myfile,filesize("school_user.html"));
                        fclose($myfile);
                }

            }else{
                echo "<h2>CONTACT AN ADMIN</h2>";
            }
        }else{
            echo "<h2>INVALID NAME OR PASSWORD</h2>";
        }
    }
?>
