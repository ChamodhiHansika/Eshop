<?php
include "header.php";
?>
<div class="bgimage">
    <img class="itemimg" src="includes\Img\additem\additem.svg" alt="">
  </div>
<div class="bghead"></div>
    <div class="forms-container">
        <div class="addnewitem">
            <form action="includes\php\user\additem.php" class="addnewcard" method="post" enctype="multipart/form-data">
            <h2 class="title">Add New Item</h2>
            <div class="input-field-list">
                <label for="item-catagary" class="">Select your Item Catagary :</label>
                <select name="category" id="item-catagary">
                <option value="Mobile Phones">Mobile Phones</option>
                <option value="Laptops">Laptops</option>
                <option value="Tv & Home Appliances">Tv & Home Appliances</option>
                <option value="Women Faction">Women's Faction</option>
                <option value="Men Faction">Men's Faction</option>
                <option value="Sports & Outdoor">Sports & Outdoor</option>
            </select>
            </div>
            <label class="lable-1 item-name">Enter Your Item Name</label>
            <div class="input-field ">
                <i class="fas fa-user1"></i>
                <input type="text" placeholder="Item Name" name="item-name"/>
            </div>
            <div class="form-control item-picture">
                <label class="label-1 ">Insert Item Picture</label>
                <br>
                <input type="file" name="item_photo" accept="item-img/*" onchange="previewImage()">
                <br>
                <img src="includes/Img/Items/additempicture.svg" alt="Preview" style="max-width: 150px; max-height: 150px;" class="itempic" id="item_picture">

            </div>
            
            <div class="stock item-stock">
                <label for="stock" class="lable-1">How many products You sell :</label>
                <input type="number" id="tentacles" name="tentacles" min="1" max="100" />
            </div>
            <label class="lable-1">price</label>
            <div class="input-field">
                <i class="fas fa-user1"></i>
                <input type="text" placeholder="price" name="itemprice"/>
            </div>
            <input type="submit" class="edit-button" value="sell" />
            </form> 
        </div>

        <div class="table-title">My Items</div>
        
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

            $sql = "SELECT * FROM items WHERE userId = {$_SESSION['userid']} ";

            echo '<form method="post">';  

            echo '<table class="userinfo" border="0" cellspacing="2" cellpadding="2" style="border-radius: 15px;"> 
                <tr class="tablehead"> 
                     
                    <td> <font face="Arial">Item Id</font> </td> 
                    <td> <font face="Arial">Category</font> </td>
                    <td> <font face="Arial">Picture</font> </td> 
                    <td> <font face="Arial">Item Name</font> </td>
                    <td> <font face="Arial">Price</font> </td> 
                    <td> <font face="Arial">Stock</font> </td>
                    <td> <font face="Arial">Edit Item</font> </td> 
                    <td> <font face="Arial">Delete Item</font> </td> 
                </tr>';

            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    
                    $field2name = $row["itemId"];
                    $field3name = $row["itemCatagary"];
                    $field4name = $row["itemPicture"];
                    $field5name = $row["itemName"];
                    $field6name = $row["userId"];
                    $field7name = $row["price"];
                    $field8name = $row["quntaty"];


                    echo '<tr> 
                            
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td><img class="cartitem" src="'.$field4name.'" alt=""></td>
                            <td>'.$field5name.'</td>
                            <td>'.$field7name.'</td>
                            <td>'.$field8name.'</td>
                            <form method="post" action="edititem.php">
                            <input type="hidden" name="edit_id" value="'.$field2name.'">
                            <td><button type="submit" name="edit" class="edit-button">Edit</button></td>
                            </form>
                            <td><button type="submit" name="delete_user" class="delete-button" value="'.$field2name.'">Delete</button></td>   
                        </tr>';
                }
                $result->free();
            } 
            echo '</table>';
            echo '</form>'; 

            ?>
        </div>
    </div>


    <script>
        function previewImage() {
        var preview = document.getElementById('item_picture');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "includes/Img/Items/additempicture.svg";
            }
        }

    </script>
            
    <?php
include "footer.php";
?>