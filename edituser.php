<?php
include "header.php";
include "includes\php\connection.php";
?>

<div class="bghead"></div>
<div class="bgimage">
<?php

$edit_id = $_POST['edit_id'];

$sql = "SELECT * FROM users WHERE userId = ?";

if(isset($_POST['edit'])) {
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../../../admin.php?stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $field2name = $row["firstName"];
        $field3name = $row["lastName"];
        $field4name = $row["email"];
        $field5name = $row["password"];
        $field6name = $row["userType"];

        echo "<form class='edituserform' method='post' action='includes\php\admin/edituser.php'>";
        echo " <label for='fname'>First name:</label><br>";
        echo "<input type='text' id='fname' name='fname' value='$field2name'>";
        echo "<label for='lname'>Last name:</label><br>";
        echo "<input type='text' id='lname' name='lname' value='$field3name'>";
        echo "<label for='lname'>Email:</label><br>";
        echo "<input type='text' id='email' name='email' value='$field4name'>";
        echo "<label for='lname'>password:</label><br>";
        echo "<input type='text' id='password' name='password' value='$field5name'>";
        echo "<label for='usertype'>User Type:</label><br>";
        echo "<select id='usertype' name='usertype'>";
        echo "<option value='admin' " . ($field6name == 'admin' ? 'selected' : '') . ">Admin</option>";
        echo "<option value='user' " . ($field6name == 'user' ? 'selected' : '') . ">User</option>";
        echo "</select>";
        echo "<input type='hidden' name='edit_id' value='$edit_id'>"; 
        echo "<button type='submit' name='edit_user' class='delete-button' value='Save'>Save</button>";
        echo "</form>";
    }

    mysqli_stmt_close($stmt);

} else {
    header("Location: ../../admin.php?stmtfail");
    exit();
}

$conn->close();
?>




