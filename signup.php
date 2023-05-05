<?php

if (isset($_POST["submit"])) 
{
    $name = $_POST["name"];
    $phoneNo = $_POST["phoneNo"];
    $email = $_POST["email"];
    $password = $_POST["password"];
  
    if (empty($name) OR empty($phoneNo) OR empty($email) OR empty($password)) 
    {
        echo " All fields are required";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo " E-mail format is invalid";
    }
    elseif (strlen($password)<8)
    {
        echo " Password must contain atleast 8 characters";
    }

    else
    {
        // connect to the database
        $conn = mysqli_connect("localhost", "root", "", "website");
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $sql="INSERT INTO registration(`name`, `phoneNo`, `email`, `password`) VALUES ('$_POST[name]','$_POST[phoneNo]','$_POST[email]','$_POST[password]')";
        
        if ($conn->query($sql) === TRUE) 
        {
          header("Location: signup_success.html");
        }
        else 
        {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>