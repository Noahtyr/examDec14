
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php
$incorrectPw = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = ""; $pass = "";
    if (!empty($_POST["nameInput"]) && !empty($_POST["passInput"]))
    {
        // title is not empty
        $name = checkInput($_POST["nameInput"]);
        $pass = checkInput($_POST["passInput"]);

    } else {
        $incorrectPw = "Name or Password cannot be empty";
    }
    if (!empty($name) && !empty($pass))
    {
        // no empty fields
        $pass = mysqli_real_escape_string($connect, $pass); // To prevent sql injection
        $sql = "SELECT * FROM admin='$name' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($query);
        if ($rows == 1)
        {
            // password correct
            $rowArr = mysqli_fetch_array($query);
            $dbPass = $rowArr['password'];

            if ($pass == $dbPass)
            {
                $incorrectPw = "Login Successful " . $name . ", " . $pass;
            } else {
                $incorrectPw = "Login Unsuccessful " . $name . ", " . $pass;
            }

        }
        else {
            // password INcorrect
            $incorrectPw = "Username or Password incorrect";
        }
    }
}
function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="mainPage.php">
    <table id="adminLoginTable">
        <tr>
            <th class="adminLoginTH">Enter Login details</th>
        </tr>
        <tr>
            <td class="adminLoginTD"><input id="nameInput" type="text" name="nameInput" placeholder="Username"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><input id="passInput" type="password" name="passInput" placeholder="Password"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><input type="submit" class="loginBtn" name="loginBtn" value="Login"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><h3 class="error"><?php echo $incorrectPw ?></h3></td>
        </tr>
    </table>
</form>

</body>
</html>