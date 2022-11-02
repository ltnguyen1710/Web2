<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
        <div class="w3-bar-item w3-wide"><a href="index.php" class="w3-button">CHECKERVIET</div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-10 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header -->

        <header class="w3-container w3-xlarge">
            <p class="w3-left"><?= isLogined() ? 'Hi, ' . $_SESSION['username'] : 'Welcome' ?></p>


            <p class="w3-right">

                <!-- Account icon -->
                <?php
                if (!isLogined()) {
                ?>
                    <a href="javascript:void(0)" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
                        <i onclick="document.getElementById('id01').style.display='block'" class="fa fa-user "></i>
                    </a>
                <?php } else { ?>
                    <a href="process/logout.php" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
                        <i class="fa fa-sign-out "></i>
                    </a>
                <?php
                }
                ?>

                <!-- Shopping icon -->
                <a href="javascript:void(0)" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
                    <i onclick="document.getElementById('shoppingcart').style.display='block'" class="fa fa-shopping-cart " aria-valuenow="3"></i>
                </a>

                <!-- Find icon -->
            <form name="fromTim" method="GET" action="Search.php">
                <!-- Bottom Bar Start -->
                <div class="w3-bar-item  bottom-bar">
                    <div class="w3-modal-find w3-padding-32 w3-right">
                        <div class="search" class="w3-container  ">
                            <button class="w3-bar-item w3-button  w3-right fa fa-search" type="submit" name="timkiem"></button>
                            <input type="text" name="tukhoa" placeholder="Search for names.." title="Type in a name" id="find" value="<?= isset($_REQUEST['tukhoa']) ? $_REQUEST['tukhoa'] : "" ?>">
                        </div>
                    </div>
                </div>
            </form>


            <!-- Bottom Bar End -->
            <!-- Shopping -->
            <div id="shoppingcart" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width: 900px">

                    <div class="w3-container w3-padding-16 w3-light-grey">
                        <span class=" cart-header ">Cart</span>
                        <span onclick="document.getElementById('shoppingcart').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                    </div>

                    <div class="cart-row w3-container">
                        <span class="cart-item cart-header cart-column">Items</span>
                        <span class="cart-price cart-header cart-column">Price</span>
                        <span class="cart-price cart-header cart-column">Size</span>
                        <span class="cart-quantity cart-header cart-column">Quantity</span>
                    </div>

                    <div class="cart-items w3-container">



                    </div>
                    <div class="cart-total">
                        <strong class="cart-total-title">Total Price: $</strong>
                        <strong class="cart-total-price" id="price"></strong>
                    </div>
                    <div class="w3-container w3-border-top w3-padding-24 ">
                        <button onclick="<?= isLogined() ? "thanhtoan(document.getElementById('price').innerHTML)" : "document.getElementById('id01').style.display='block'" ?>" type="button" class="w3-button w3-red w3-transparent w3-right">Buy</button>
                    </div>

                </div>
            </div>

            <!-- Account -->
            <!--login-->

            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <h1>Log in</h1>
                    </div>

                    <form action='index.php' method="post" class="w3-container">
                        <div class="w3-section">
                            <label><b>User name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="username" required value="checker">
                            <label><b>Password</b></label>
                            <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required value="12345">
                            <input class="w3-button w3-block w3-black w3-section w3-padding" type="submit" value="Log in">
                            <a class="w3-button w3-block w3-gray w3-section w3-padding" onclick="document.getElementById('id02').style.display='block'">Sign up</a>
                            <input class="w3-check w3-margin-top " type="checkbox" checked="checked"> Remember me
                        </div>
                    </form>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-grey">Cancel</button>
                        <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
                    </div>

                </div>
            </div>

            <!--Sign up-->
            <div id="id02" class="w3-modal w3-padding-24">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <h1>Create account</h1>
                    </div>

                    <form class="w3-container" action="index.php" method="POST" name="signup" onsubmit="return kiemTraDuLieu()">
                        <div class="w3-section">

                            <label><b>Full name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Full name" name="fullname" required>
                            <label><b>Phone number</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="tel" placeholder="Enter your phone number" pattern="[0][2,7,9]{1}[0-9]{4}[0-9]{4}" name="phone" required>

                            <label><b>Sex: </b></label>
                            Male <input class="" type="radio" name="radsex" required>
                            Female <input class="" type="radio" name="radsex" required>

                            <br>

                            <label><b>Birthday:</b></label>
                            <input type="date" name="bday">

                            <br>
                            <label><b>Email:</b></label>
                            <br>
                            <input class="w3-input w3-border w3-margin-bottom" type="email" name="useremail" placeholder="Enter email" required>
                            <label><b>User name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="username1" required>
                            <label><b>Password</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="psw1" id="psw1" required>
                            <label><b>Confirm password</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Confirm Password" name="repsw" id="repsw" required>

                        </div>


                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-grey">Cancel</button>
                            <input class="w3-button  w3-black w3-right" name="submit" value="Submit" href="#" type="Submit" onclick="">
                        </div>

                </div>
                </form>
            </div>

            <!--check out-->
            <div id="checkout" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('checkout').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <h1>Checkout</h1>
                    </div>
                    <?php
                    $con = createDBConnection();
                    $sql = "SELECT * FROM khachhang WHERE userKH='" . $_SESSION['username'] . "'";
                    $result = $con->query($sql);
                    $row = $result->fetch_assoc()
                    ?>
                    <form class="w3-container">
                        <div class="w3-section">
                            <label><b>Full name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= $row['hoTen'] ?>" name="adress" required disabled>
                            <label><b>Phone number</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="tel" value="<?= $row['sdt'] ?>" name="tel" required disabled>
                            <label><b>Adress</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="email" name="useraddress" id="useraddress" placeholder="Enter Adress" required>
                            <label><b>Nation</b></label>
                            <select name="nation">
                                <option value="">Vietnam</option>
                                <option value="">USA</option>
                                <option value="">UK</option>
                                <option value="">Spain</option>
                            </select>
                            <br>
                            <label><b>Payments</b></label>
                            <select name="nation">
                                <option value="">Credit card</option>
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </form>
                    <div class="cart-total">
                        <strong class="cart-total-title">Total Price: $</strong>
                        <strong class="cart-total-price" id="price1"></strong>
                    </div>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        <button onclick="document.getElementById('checkout').style.display='none'" type="button" class="w3-button w3-grey">Cancel</button>
                        <button class="w3-button w3-red w3-right" name="Confirm" onclick="xulythanhtoan('<?= $_SESSION['username'] ?>')">Confirm</button>
                    </div>

                </div>
            </div>
        </header>

</body>

</html>