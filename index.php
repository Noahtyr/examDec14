<?php
/**
 * Created by PhpStorm.
 * User: Noah
 * Date: 14-12-2017
 * Time: 10:09
 */

?>

<!--NOTE, The Login PHP file is renmaed to INDEX. The reason for this is that this is the first   -->
<!-- Page you should land on, so you can write in a password -->
<html>
<form action="mainPage.php" method="post">
    Name: <input placeholder="Name..." type="text" name="name"><br>
    <br>
    Password: <input placeholder="Password..." type="text" name="password"><br>
    <br>
    <input type="submit">

</html>
    <?php
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = 'Please enter username.';
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST['password']))) {
            $password_err = 'Please enter your password.';
        } else {
            $password = trim($_POST['password']);
        }
    }

    if(isset($_POST["name"], $_POST["password"]))
    {

        $name = $_POST["name"];
        $password = $_POST["password"];

        $result1 =("SELECT userName, password FROM admin WHERE username = '".$name."' AND  password = '".$password."'");

        if(($result1) > 0) {
        $_SESSION["logged_in"] = true;
        $_SESSION["naam"] = $name;
    }
        else {
            echo 'The username or password are incorrect!';
        }
    }
    ?>
<html>

    <br><input type="radio" name="gender" value="male" checked> Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
    <input type="radio" name="gender" value="Attack Helicopter"> Attack Helicopter


</form>

</html>
