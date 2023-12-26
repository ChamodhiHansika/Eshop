<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sell"])) {
    $field1 = $_POST["edit_id"];
    $field2 = $_POST["category"];
    $field3 = $_POST["item-name"];
    $itemimg = $_FILES['item_photo']['name'];
    $tempname = $_FILES['item_photo']['tmp_name'];
    $folder="item-img/".$itemimg;
    move_uploaded_file($tempname,$folder);
    $field5 = $_POST["tentacles"];
    $field6 = $_POST["itemprice"];
    $field4 = $_POST["preimg"];

    if (strlen($folder) > 0) {
        $field7 = $folder;
    }

    else {
        $field7 = $field4;
    }


    $update = "UPDATE items SET itemCatagary=?, itemName=?, itemPicture=?, quntaty=? , price=? WHERE itemId=?";
    
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $update)) {
        mysqli_stmt_bind_param($stmt, "sssssi", $field2, $field3, $field7, $field5, $field6, $field1 );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        header("Location: ../../../myitems.php");
        exit();
    } else {
        header("Location: ../../../edititem.php?stmtfail");
        exit();
    }
} else {
    header("Location: ../../../edititem.php?stmtfail");
    exit();
}

$conn->close();
?>

