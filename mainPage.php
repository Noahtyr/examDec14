<?php
/**
 * Created by PhpStorm.
 * User: Noah Davidian
 * Date: 14-12-2017
 * Time: 09:08
 */


// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'explorecalifornia');
mysqli_set_charset($link,'utf8');

// If Connection Failed, Close
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
    }
    ?>

    <style>

        table {
            border: 2px solid lawngreen;
            border-radius: 5px;
        }

        th{
            background-color: #4CAF50;
            color: white;
            border: 2px solid lawngreen;
            font-style: oblique;
            font-size: large;

        }

        td{
            border: 2px solid lawngreen;
            border-radius: 5px;
            padding: 6px;
            text-align: center;

        }
    </style>

<html>
<h2>Welcome <?php echo $_POST["name"]; ?><br></h2>
<h4> Your Password is: <?php echo $_POST["password"]; ?><br></h4>
<h4> Your Current Gender is: <?php echo $_POST["gender"];?></h4>
</html>


<?php
    $sql = "SELECT tourName, description, price, keywords FROM tours";

    $result = $link->query($sql);

 if ($result->num_rows > 0) {


    echo "<table><tr><th>Tour Name</th><th>Description</th><th>Price</th><th>Keywords</th><th>Picture</th></tr>";
    echo " <br><h4>Here is a list of Tours and their relevant information:</h4><br>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["tourName"]."</td><td> ". $row["description"]."</td><td>". $row["price"] . "</td><td>". $row["keywords"] ."</td></tr>";
    }

} else {
     echo "0 Results Found.";
}


mysqli_close($link);
exit;





