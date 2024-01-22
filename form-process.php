<?php
    $con = mysqli_connect("localhost", "root", "", "formdata");
    if ($con == false) {
        die("Connection Error: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $query = mysqli_query($con, "INSERT INTO data (FisrtName, LastName, Email, Password) VALUES ('$fname', '$lname', '$email', '$password')");

        if ($query) {
            echo "<script>alert('Data inserted successfully')</script>";
            
            $result = mysqli_query($con, "SELECT * FROM data");
            if ($result) {
                $html = "<h2>User Data</h2><table border='1'><tr><th>FirstName</th><th>LastName</th><th>Email</th><th>Password</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= "<tr><td>{$row['FisrtName']}</td><td>{$row['LastName']}</td><td>{$row['Email']}</td><td>{$row['Password']}</td></tr>";
                }

                $html .= "</table>";

                echo $html;
            } else {
                echo "Error fetching data: " . mysqli_error($con);
            }
        } else {
            echo "<script>alert('There is an error')</script>";
        }
    }

    mysqli_close($con);
?>
