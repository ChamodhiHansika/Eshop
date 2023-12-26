<?php
include "header.php";
?>
<div class="bghead"></div>

  <div class="bgimage">
    <img class="adminimg" src="includes/Img/adminpage/admin.png" alt="">
  </div>
  <div class="card-pannel">
    <div class="feature-card">
        <span class="title-card">Add New User</span>
        <p class="description">You can easily add new users . </p>
        <div class="actions">
            <button class="pref">
                
            </button>
            <button class="accept">
                Click !
            </button>
        </div>
    </div>
    <div class="feature-card">
        <span class="title-card">Edit All Items</span>
        <p class="description">You can edits all items in website and delete items. </p>
        <div class="actions">
            <button class="pref">
            
            </button>
            <button class="accept">
              <a href="allitems.php">Click !</a>
            </button>
        </div>
    </div>
    <div class="feature-card">
        <span class="title-card">Admin Request</span>
        <p class="description">Users admin requests. Can you accept it. </p>
        <div class="actions">
            <button class="pref">
             
            </button>
            <button class="accept">
              Click !
            </button>
        </div>
    </div>
    <div class="feature-card">
        <span class="title-card">View Reports</span>
        <p class="description"> Reports in this category encompass user feedback, support ticket volumes, response times, and satisfaction ratings. </p>
        <div class="actions">
            <button class="pref">
            <i class="fa-solid fa-user-plus1"></i>
            </button>
            <button class="accept">
              Click !
            </button>
        </div>
    </div>
  </div>
  <div class="table-title">Users Details</div>
  
<?php
include "includes/php/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["delete_user"])) {
        $user_id = $_POST["delete_user"];
        $delete_sql = "DELETE FROM users WHERE userId = $user_id";
        $conn->query($delete_sql);
    }
}

$sql = "SELECT * FROM users ";

echo '<form method="post">';  // Add a form to handle the delete button submission

echo '<table class="userinfo" border="0" cellspacing="2" cellpadding="2" style="border-radius: 15px;"> 
      <tr class="tablehead"> 
          <td> <font face="Arial">User Id</font> </td>
          <td> <font face="Arial">First Name</font> </td> 
          <td> <font face="Arial">Last Name</font> </td> 
          <td> <font face="Arial">Email</font> </td> 
          <td> <font face="Arial">Password</font> </td>
          <td> <font face="Arial">User Type</font> </td>
          <td> <font face="Arial">Edit User</font> </td> 
          <td> <font face="Arial">Actions</font> </td> 
      </tr>';

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["userId"];
        $field2name = $row["firstName"];
        $field3name = $row["lastName"];
        $field4name = $row["email"];
        $field5name = $row["password"];
        $field6name = $row["userType"];

        echo '<tr> 
                  <td>'.$field1name.'</td>  
                  <td>'.$field2name.'</td>
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td>
                  <td>'.$field6name.'</td>
                  <form method="post" action="edituser.php">
                    <input type="hidden" name="edit_id" value="'.$field1name.'">
                    <td><button type="submit" name="edit" class="edit-button">Edit</button></td>
                    </form>
                  <td><button type="submit" name="delete_user" class="delete-button" value="'.$field1name.'">Delete</button></td>   
              </tr>';
    }
    $result->free();
} 
echo '</table>';
echo '</form>'; 

?>



<?php
include "footer.php";
?>

