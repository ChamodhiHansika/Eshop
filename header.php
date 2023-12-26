<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="includes\Css\home.css" />
<link rel="stylesheet" href="includes/Css/style1.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


<style>
    .card .caption .prod_name {
        font-size:15px;
    }

    .homebg {
        width:100%;
        height: 100vh;
        background-image: url(./includes/Img/home/bgtop.jpg);
        background-position: center;
        background-size: cover;
        display:grid;
        grid-template-columns: repeat(1,1fr);
        align-items: center;
    }

    .help{
        width:100%;
        height: 100vh;
        background-image: url(./includes/Img/help/hel.jpg);
        background-position: center;
        background-size: cover;
        display:grid;
        grid-template-columns: repeat(1,1fr);
        align-items: center;
    }


    .aboutbg {
        width: 100%;
        height:100%;
        align: left;
        position: fixed;
        z-index: -2;  
    }

    .about-1 h1{
        text-align: center;
        padding-top: 100px;
        font-size: 45px;
        color: black;
        font-weight: bolder;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    .about-1 p{
        text-align: center;
        padding-top: 50px;
        font-size: 15px;
        color: rgb(18, 0, 0);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .about-1 h1::after{
        content:"";
        height: 4px;
        width: 230px;
        background-color: #0b0b0b;
        display: block;
        margin: auto;
    }
    .about-item{
        margin-bottom: 120px;
        margin-top: 120px;
        background-color: rgb(62, 19, 204);
        padding: 80px,30px;
        box-shadow: 0 0 9px rgba(0,0,0);
    }
    .services{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin:75px auto;
        text-align: center;
    }
    .card-help{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: column;
        margin:0px 20px;
        padding: 20px 20px;
        background-color: rgb(255, 255, 255);
        border-radius: 10px;
        cursor: pointer;
    }
    .card-help:hover{
        background-color: rgba(21, 25, 245, 0.664);
        transition: 0.4s ease;
    }
    .card-help .icon{
        font-size: 35px;
        margin-bottom: 10px;
    }
    .card-help h2{
        font-size: 28px;
        color: rgb(136, 6, 6);
        margin-bottom: 20px;
    }
    .card-help p{
        font-size: 17px;
        margin-bottom: 30px;
        line-height: 1.5;
        color: rgb(24, 14, 2);
    }
    .button-help{
        font-size: 15px;
        text-decoration: none;
        color: aliceblue;
        background-color: blue;
        padding: 8px 12px;
        border-radius: 5px;
        letter-spacing: 1px;
    }
    .button-help:hover{
        background-color: rgb(125, 12, 12);
        transition: 0.4s ease;
    }

    footer{
        text-align: center;
    }

    /* myitems */
    .forms-container {
        position: absolute;
        width: 100%;
        height: 100%;
        /* margin-left:20px; */
    }


    input  {
        font-family: "Poppins", sans-serif;
    }

    label {
        font-family: "Poppins", sans-serif;
        font-size: 1.0rem;
        padding-top: 20px;
    }

    form {
        display: flex;
        /* align-items: center; */
        /* justify-content: center; */
        flex-direction: column;
        padding: 0rem 5rem;
        transition: all 0.2s 0.7s;
        overflow: hidden;
        grid-column: 1 / 2;
        grid-row: 1 / 2;
    }

    .title {
        font-size: 1.8rem;
        color: #444;
        padding-top: 20px; 
        padding-bottom: 20px; 
    }

    .input-field {
        max-width: 250px;
        width: 75%;
        background-color: #f0f0f0;
        margin: 10px 0;
        height: 40px;
        border-radius: 30px;
        display: grid;
        grid-template-columns: 15% 85%;
        padding: 0 0.4rem;
        position: relative;
    }

    .input-field input {
        background: none;
        outline: none;
        border: none;
        line-height: 1;
        font-weight: 600;
        font-size: 1.1rem;
        color: #333;
    }

    .input-field input::placeholder {
        color: #aaa;
        font-weight: 500;
    }

    .addnewitem {
        margin-top: 120px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 20px 20px 30px rgba(0, 0, 0, .05);
        height: 700px;
        width: 500px;
        margin-left:200px;
    }

    .itemimg {
        width: 20%;
        position: fixed;
        bottom: 0;
        right: 0;
        z-index: -2;
    }



    /* -------------------------------------------------------- */

    .edituserform {
        margin-bottom: 10px;
        padding-top: 150px;
        margin-left: 60px;
        margin-bottom: 10px;
        height: 700px;
        width: 500px;
    /* background-color: #fff; */
        border-radius: 10px;
        box-shadow: 20px 20px 30px rgba(0, 0, 0, .05);
    }

    .fname,.lname, {
        display: block;
        font-weight: bold;
    }

    input, select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }


    /* ----------------------------------addtocart-----------------------------*/

    .cartitem{
        width: auto;
        height: 50px;
    }

    .quntity {
        width: 50px;
    }

    .cart-title {
        padding-top: 100px;
        font-size: 35px;
    }
    .cart {
        margin-top: 40px;
    }

    .checkout-button {
        width: 90px;
        height: 30px;
        margin-left: 1030px;
    }

    .total-cost {
        margin-top:20px;
        margin-left: 950px;
    }

    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 300px;
        text-align: center;
        border-radius: 10px;
    }

    .popup button {
        margin-top: 10px;
        width: 100px;
        background-color: #5995fd;
        border: none;
        outline: none;
        height: 30px;
        border-radius: 49px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.5s;
    }

/* -------------------myitems------------------------ */
    .item-name {
        margin-top:10px;
    }

    .item-picture, .item-stock {
        padding-top:10px;
    }

        
</style>

</head>
<body>


<!------------ navigation bar ---------------->

<ul>
    <div class="container-nav">
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="myitems.php">My products</a></li>
                <li><a href="addtocart.php"><img class="cart-icon" src="includes/Img/navbar/cart.png" alt=""></a></li>
                <li><a href="help.php">Help</a></li>

                <!-- check user or admin to display admin pannel -->
                <?php
                if($_SESSION['usertype']=='admin'){
                    echo '<li><a href="admin.php">admin</a></li>';
                }
                else {
                    echo '<li><a href="aboutus.php">About Us</a></li>';
                }
                ?>
                <li><img class="profile-icon" src="includes/Img/navbar/profileicon.png" alt=""></li>
                <div class="dropdown-content">
                    <a href="#"><?php echo $_SESSION['firstname']; ?>
                    <a href="#">Settings</a>
                    <a href="includes/php/logout.php">Logout</a>
                </div>
            </ul>
        </nav>
    </div>
    
    <!-- nav dropdown menu display when click profilr picture -->
    <script src="includes/Js/navbar.js"></script>  
</ul>

<div class="container-2">