<?php
session_start();
include "../connection.php";
$edit_id = $_POST['addtocart'];
$userid = $_SESSION['userid'];
$count = $_POST['count'];

$sql = "SELECT * FROM items WHERE  itemId = {$edit_id} ";

$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $field1name = $row["itemName"];
    $field2name = $row["itemPicture"];
    $field3name = $row["price"];
  }
} else {
  echo "0 results";
}


$sql = "INSERT INTO cart (itemId, userId, itemName, ItemPicture, price, count) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../../../home.php#{$edit_id}");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iisssi", $edit_id, $userid, $field1name, $field2name, $field3name, $count);
    mysqli_stmt_execute($stmt);
    header("Location: ../../../home.php#{$edit_id}");

$conn->close();
?>
