<?php
session_start();
include "..\connection.php";

// Get add new item form data
$category = $_POST["category"];
$itemname = $_POST["item-name"];
$tentacles = $_POST["tentacles"];
$userid = $_SESSION['userid'];
$itemimg = $_FILES['item_photo']['name'];
$tempname = $_FILES['item_photo']['tmp_name'];
$folder="item-img/".$itemimg;
move_uploaded_file($tempname,$folder);

// $itempic = $_POST['item-picture'];
$price = $_POST['itemprice'];


$sql = "INSERT INTO items (itemCatagary, itemName, userId, itemPicture, quntaty, price) 
VALUES ('$category','$itemname','$userid','$folder','$tentacles','$price')";

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    header("Location:../../../myitems.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>