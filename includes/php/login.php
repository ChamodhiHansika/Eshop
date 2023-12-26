<?php
include "connection.php";

// check click login button
if (isset($_POST["login"])){

    // Get data from login page
    $username = $_POST['login_username']; 
    $password = $_POST['login_password']; 

    // Check User name and Password Sql Query
    $sql = "SELECT * FROM users WHERE email= ? AND password= ?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../../index.php?stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ( $row = mysqli_fetch_assoc($result)) {
        // User exists, log them in
        // echo "Login successful!";

        // srat session and store login user detailes
        session_start();
        $_SESSION['userid'] = $row["userId"];
        $_SESSION['firstname'] = $row["firstName"];
        $_SESSION['lastname'] = $row["lastName"]; 
        $_SESSION['email'] = $row["email"]; 
        $_SESSION['usertype'] = $row["userType"]; 

        // login home page
        header("Location: ../../home.php");
        exit();
    }

    else {
        // Invalid credentials, show an error message or redirect
        // echo "Invalid username or password.";
        header("Location: ../../index.php?error=accountnotfound"); 
        exit();
    }
    mysqli_stmt_close($stmt);   
}

else {
    header("Location: ../../index.php");
    exit(); // added exit after header
}

$conn->close();
?>
