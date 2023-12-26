<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_user"])) {
    $edit_id = $_POST["edit_id"];
    $newFirstName = $_POST["fname"];
    $newLastName = $_POST["lname"];
    $newEmail = $_POST["email"];
    $newUserType = $_POST["usertype"];

    $update = "UPDATE users SET firstName=?, lastName=?, email=?, userType=? WHERE userId=?";
    
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $update)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $newFirstName, $newLastName, $newEmail, $newUserType, $edit_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        header("Location: ../../../admin.php");
        exit();
    } else {
        header("Location: ../../../admin.php?stmtfail");
        exit();
    }
} else {
    header("Location: ../../../admin.php?stmtfail");
    exit();
}

$conn->close();
?>
