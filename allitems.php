<?php
include "header.php";
?>
<div class="bghead"></div>
    <div class="forms-container">
        
        <div class="table-title-all">All Items</div>
        
        <div class="item-table">
            <?php
            include "includes\php\connection.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST["delete_user"])) {
                    $itemid = $_POST["delete_user"];
                    $delete_sql = "DELETE FROM items WHERE itemId = $itemid";
                    $conn->query($delete_sql);
                }
            }

            $sql = "SELECT * FROM items";

            // Add a form to handle the delete button submission
            echo '<form method="post">';  

            echo '<table class="userinfo" border="0" cellspacing="2" cellpadding="2" style="border-radius: 15px;"> 
                <tr class="tablehead"> 
                     
                    <td> <font face="Arial">Item Id</font> </td> 
                    <td> <font face="Arial">Category</font> </td> 
                    <td> <font face="Arial">Item Name</font> </td>
                    <td> <font face="Arial">User Id</font> </td>
                    <td> <font face="Arial">Price</font> </td> 
                    <td> <font face="Arial">Stock</font> </td>
                    <td> <font face="Arial">Edit Item</font> </td> 
                    <td> <font face="Arial">Delete Item</font> </td> 
                </tr>';

            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    
                    $field2name = $row["itemId"];
                    $field3name = $row["itemCatagary"];
                    $field4name = $row["itemName"];
                    $field5name = $row["userId"];
                    $field6name = $row["price"];
                    $field7name = $row["quntaty"];


                    echo '<tr> 
                            
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td>'.$field4name.'</td>
                            <td>'.$field5name.'</td>
                            <td>'.number_format($field6name, 2).'</td>
                            <td>'.$field7name.'</td>
                            <td><button type="submit" name="edit" class="edit-button"value="'.$field2name.'" >Edit</button></td>
                            <td><button type="submit" name="delete_user" class="delete-button" value="'.$field2name.'">Delete</button></td>   
                        </tr>';
                }
                $result->free();
            } 
            echo '</table>';
            echo '</form>'; 

            ?>
        </div>

        <div class="back">
            <button class="edit-button"><a href="admin.php" class='back-button-text'>Back</a></button>
        </div>
    </div>
    
        

    <?php
include "footer.php";
?>