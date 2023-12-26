<?php
include "header.php";
?>

    <section class="homebg"></section>

    <?php

    include './includes/php/connection.php';

    $sql = "SELECT * FROM items";
    $all=$conn->query($sql);
    ?>

    <main>
        <?php
            while($row=mysqli_fetch_assoc($all)){
        ?>

        <div class="card" id="<?php echo $row["itemId"]; ?>">
            <div class="image">
                <img src="<?php echo $row["itemPicture"]; ?>" alt="">
            </div>

            <div class="caption">
                <p class="prod_name"><?php echo $row["itemName"]; ?></p>
                <p class="price"><b>Rs. <?php echo number_format($row["price"], 2); ?></b></p>
            </div>

            <form action="includes\php\addtocard\add.php" method="post">
                <input class="cartcount" type="number" id="" name="count" min="1" max="100" value="1"/>
                <button class="add" value="<?php echo $row["itemId"]; ?>" name="addtocart">Add to Cart</button>
            </form>
        </div>

        <?php  
        }
        ?>

    </main>


<?php
include "footer.php";
?>
