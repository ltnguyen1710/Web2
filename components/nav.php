<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <a href="index.php"><img src="Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
        </div>
        <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">

            <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Shirt <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="T-shirt.php" class="w3-bar-item w3-button">T-Shirt</a>
                <!-- <a href="#" class="w3-bar-item w3-button">Hoodie</a>
                <a href="#" class="w3-bar-item w3-button">Sweater</a> -->
                <a href="Jacket.php" class="w3-bar-item w3-button">Jackets</a>
            </div>

            <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Item <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="#" class="w3-bar-item w3-button">Chain</a>
                <a href="#" class="w3-bar-item w3-button">Socks</a>
                <a href="#" class="w3-bar-item w3-button">Wallet</a>
            </div>

            <a href="#" class="w3-bar-item w3-white w3-button ">Pants</a>

        </div>
        <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
        <a href="#footer" class="w3-bar-item w3-button w3-padding">Subscribe</a>
    </nav>
</body>

</html>