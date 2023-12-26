<?php

include "connection.php";

// check click register button
if (isset($_POST["sign_up"])) {

  // Store data from register form
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Create SQL query
  $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
  
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location:../../index.php?error=stmtfail");
    exit();
  }
  
  // $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $password);
  mysqli_stmt_execute($stmt); 
  mysqli_stmt_close($stmt);
  header("Location:../../index.php?error=success");
  exit();
}
else {
  header("Location:../../index.php");
}


?>
