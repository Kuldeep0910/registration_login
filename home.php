<html>
    <head>
        <style>
            .button
            {
                background-color: rgb(207, 150, 75);
                padding: 10px;
                width:10%;
                margin-bottom: 35px;
                font-size: 20px;
                border: 2px solid rgb(181, 169, 169);
                border-bottom: 2px solid#b4c6b9;
                border-right: 2px solid#b2bdb5;
                border-radius: 25px;
            }
        </style>
    </head>
    <body>
        <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- <a href="signin.html"><button class="button" type="button" name="login">Sign in</button></a>
        <a href="signup.html"><button class="button" type="button" name="signup">Sign up</button></a> -->
            <input type="submit" name="login" class="button" value="Sign in">
            <input type="submit" name="signup" class="button" value="Sign up">
        </form>
</body>
</html>
<?php
 if (isset($_POST["login"])) {
    header("Location: signin.html");
 }
 elseif(isset($_POST["signup"]))
 {
    header("Location: signup.html");
 }
?>