<?php
include "header.php";
include "includes/php/connection.php";

if(isset($_POST['edit'])) {
    $edit_id = $_POST['edit_id'];
    $sql = "SELECT * FROM items WHERE itemId = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: myitems.php?stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $field1name = htmlspecialchars($row["itemCatagary"]);
        $field2name = htmlspecialchars($row["itemName"]);
        $field3name = htmlspecialchars($row["itemPicture"]);
        $field4name = htmlspecialchars($row["quntaty"]);
        $field5name = htmlspecialchars($row["price"]);

    } else {
        echo "No data found for the given user ID.";
    }

    mysqli_stmt_close($stmt);

} else {
    header("Location: myitem.php?stmtfail");
    exit();
}

$conn->close();
?>


<div class="bghead"></div>
    <div class="forms-container">
        <div class="addnewitem">
            <form action="includes/php/user/edititem.php" class="addnewcard" method="post" enctype="multipart/form-data">
            <h2 class="title">Edit Item</h2>
            <div class="input-field-list">
                <label for="item-catagary" class="">Select your Item Category :</label>
                <select name="category" id="item-catagary">
                    <option value="Mobile Phones" <?php if($field1name == "Mobile Phones") echo "selected"; ?>>Mobile Phones</option>
                    <option value="Laptops" <?php if($field1name == "Laptops") echo "selected"; ?>>Laptops</option>
                    <option value="Tv & Home Appliances" <?php if($field1name == "Tv & Home Appliances") echo "selected"; ?>>Tv & Home Appliances</option>
                    <option value="Women's Fashion" <?php if($field1name == "Women's Fashion") echo "selected"; ?>>Women's Fashion</option>
                    <option value="Men's Fashion" <?php if($field1name == "Men's Fashion") echo "selected"; ?>>Men's Fashion</option>
                    <option value="Sports & Outdoor" <?php if($field1name == "Sports & Outdoor") echo "selected"; ?>>Sports & Outdoor</option>
                </select>
            </div>

            <label class="lable-1 item-name">Enter Your Item Name</label>
            <div class="input-field ">
                <i class="fas fa-user1"></i>
                <input type="text" placeholder="Item Name" name="item-name" value="<?php echo $field2name; ?>"/>
            </div>
            <div class="form-control item-picture">
                <label class="label-1 ">Insert Item Picture</label>
                <br>
                <input type="file" name="item_photo" accept="image/*" onchange="previewImage()">
                <br>
                <img src="<?php echo $field3name; ?>" alt="Preview" style="max-width: 150px; max-height: 150px;" class="itempic" id="item_picture" >
            </div>
            
            <div class="stock item-stock">
                <label for="stock" class="lable-1">How many products You sell :</label>
                <input type="number" id="tentacles" name="tentacles" min="1" max="100" value="<?php echo $field4name; ?>" />
            </div>
            <label class="lable-1">price</label>
            <div class="input-field">
                <i class="fas fa-user1"></i>
                <input type="text" placeholder="price" name="itemprice" value="<?php echo $field5name; ?>"/>
            </div>
            <input type='hidden' name='edit_id' value='<?php echo $edit_id; ?>'>
            <input type='hidden' name='preimg' value='<?php echo $field3name; ?>'>
            <input type="submit" class="edit-button" value="sell" name="sell" />
            </form> 
        </div>
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