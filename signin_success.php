<?php

if (isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($email) || empty($password))
    {
        echo "Please enter email + password";
    }

    else
    {
        // connect to the database
        $conn = mysqli_connect("localhost", "root", "", "website");
        // Check connection
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            $stmt = $conn->prepare("SELECT * from registration where email = ? ");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows === 1)
            {
                $data = $stmt_result->fetch_assoc();
                if($data['password'] === $password)
                {
                    echo "signed in";
                }
                else 
                {
                    echo " invalid password";
                }
            }
            else 
            {
                echo "invalid email";
            }
        }
    }
}
?>
