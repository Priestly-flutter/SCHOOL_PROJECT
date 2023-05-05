<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";

    // Create connection
    $conn = new mysqli("localhost", "root", " ", "user_details");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql = "SELECT * FROM MyGuests";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr> <td>".$row["ID"]."</td>".
                "<td>".$row["NAME"]."</td>".
                "<td>".$row["REGION"]."</td>".
                "<td>".$row["REGISTRATION_ID"]."</td>".
                "<td>".$row["PASSWORD"]."</td>".
                "<td>".$row["STUDENT_REGISTERED"]."</td>".
                "<td>".$row["EXAM_OFFERING"]."</td>".
                "<td>".$row["STUDENT_PASS_KEY"]."</td>";
            }
        }
    }

?>dcv9 0op:Pp