p<?php
/**
 * Created by PhpStorm.
 * User: Noah Juaquin Davidian
 * Date: 14-12-2017
 * Time: 10:20
 */

// Er dit JSON Api Restful?  JSON APi er restul, da man har mulighed for at kunne bruge Get, Post, put og delete og kunne bruge dem i HTTP
// Vi får derfor JSON objekter fra vores API. På vores JSON API på Mamp, har vi mulighed for at selecte alt information
// Om en specifik Tour med udgangspunkt i deres ID. Dette information bliver vist i JSON objekter og bliver skrevet I HTTP


//This is our instance Variable
$method = $_SERVER['REQUEST_METHOD'];
$array = [];
parse_str ($_SERVER['QUERY_STRING'], $array);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'explorecalifornia');
mysqli_set_charset($link,'utf8');




// This If statement will give us information regarding Tours, If ID is requested in the URL
// I will be shown in JSON format, since its JSON encoded.
if ($method == 'GET' && array_key_exists('ID',$array)) {
    $sql = "Select * FROM tours WHERE tourId =".$array['ID'];
    $result = mysqli_query($link,$sql);
    if (!$result){
        http_response_code(404);
        die(mysqli_error());

    }
    echo json_encode($result->fetch_assoc());

} else{
    echo "One like = one fuck off";
}
// close mysql connection
mysqli_close($link);
exit;


