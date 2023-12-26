<?php
include "header.php";
?>

<div class="bghead"></div>


<?php
include "includes/php/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["delete_cart"])) {
        $item_name = $_POST["delete_cart"];

        // Use prepared statement to prevent SQL injection
        $delete_sql = $conn->prepare("DELETE FROM cart WHERE itemName = ?");
        $delete_sql->bind_param("s", $item_name);
        $delete_sql->execute();

        // Close the prepared statement
        $delete_sql->close();
    }
}

$user_id =  $_SESSION['userid'] ;
$total_cost = 0;
$sql = "SELECT itemName, ItemPicture, price, SUM(count) as total_count FROM cart WHERE userId = $user_id GROUP BY itemName";

echo '<form method="post">';  
echo '<div class="table-title cart-title">Cart</div>';
echo '<table class="userinfo cart" border="0" cellspacing="2" cellpadding="2" style="border-radius: 15px;"> 
      <tr class="tablehead"> 
          <td> <font face="Arial">Preview</font> </td>
          <td> <font face="Arial">Name</font> </td> 
          <td> <font face="Arial">Price</font> </td> 
          <td> <font face="Arial">Quantity</font> </td> 
          <td> <font face="Arial">Remove</font> </td>
          <td> <font face="Arial">Sub Total</font> </td> 
      </tr>';

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        
        $field1name = $row["ItemPicture"];
        $field2name = $row["itemName"];
        $field3name = $row["price"];
        $field4name = $row["total_count"];
        
        echo '<tr> 
                  <td><img class="cartitem" src="'.$field1name.'" alt=""></td>
                  <td>'.$field2name.'</td>
                  <td>'.number_format($field3name, 2).'</td> 
                  <td><input class="quntity" type="number" name="quantity[]" value="'.$field4name.'" min="1" oninput="updateSubtotal(this)" data-price="'.$field3name.'"></td>
                  <td><button type="submit" name="delete_cart" class="delete-button" value="'.$field2name.'">Delete</button></td> 
                  <td class="subtotal">'.number_format($field3name * $field4name, 2).'</td>
              </tr>';
              
              $total_cost += $field3name * $field4name;
    }
    $result->free();
} 
echo '</table>';
echo '</form>';

echo '<div class="total-cost ">Total Cost: Rs. ' . number_format($total_cost, 2) . '</div>';
echo '<button type="submit" name="checkout" class="checkout-button edit-button" onclick="showPopup()">Checkout</button>';

?>




<script>
function updateSubtotal(input) {
    var price = parseFloat(input.getAttribute('data-price'));
    var quantity = parseInt(input.value);
    var subtotalElement = input.parentElement.nextElementSibling.nextElementSibling; // Get the subtotal element
    var subtotal = price * quantity;
    subtotalElement.innerText = parseFloat(subtotal).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    
    updateTotalCost(); // Call the function to update total cost
}

function updateTotalCost() {
    var totalCostElement = document.querySelector('.total-cost');
    var subtotals = document.querySelectorAll('.subtotal');
    var totalCost = 0;
    
    subtotals.forEach(function(subtotal) {
        totalCost += parseFloat(subtotal.innerText.replace(/,/g, ''));
    });
    
    totalCostElement.innerText = 'Total Cost: ' + totalCost.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

function showPopup() {
    var popup = document.createElement("div");
    popup.classList.add("popup");
    popup.innerHTML = "<p>Please add your payment details</p>";
    
    var closeButton = document.createElement("button");
    closeButton.textContent = "Close";
    closeButton.addEventListener("click", function() {
        popup.remove();
    });
    
    popup.appendChild(closeButton);
    document.body.appendChild(popup);
}

</script>

<?php
include "footer.php";
?>
