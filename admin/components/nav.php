 <!-- Sidebar/menu -->
 <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
     <div class="w3-container w3-display-container w3-padding-16">
         <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
         <a href="index.php"><img src="../Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
     </div>
     <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">
         <a href="index.php" class="w3-bar-item w3-button w3-white">Home</a>
         <a href="admin.php" class="w3-button w3-block w3-white w3-left-align">Order management</a>
         <a href="Productmanagement.php" class="w3-bar-item w3-button w3-white">Product management</a>
         <a href="userManagement.php" class="w3-button w3-block w3-white w3-left-align">User management</a>
         <a href="orderHistory.php" class="w3-button w3-block w3-white w3-left-align">History management</a>
     </div>
 </nav>
 <!-- Top menu on small screens -->
 <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
     <div class="w3-bar-item w3-wide"><a href="demo.html" class="w3-button">CHECKERVIET</div>
     <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-10 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
 </header>

 <!-- Overlay effect when opening sidebar on small screens -->
 <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

 <!-- !PAGE CONTENT! -->
 <div class="w3-main" style="margin-left:250px">

     <!-- Push down content on small screens -->
     <div class="w3-hide-large" style="margin-top:83px"></div>

     <!-- Top header -->
     <header class="w3-container w3-xlarge w3-padding-24">
         <p class="w3-left">Hi admin</p>
         <p class="w3-right">

             <!-- Log out icon -->
             <a href="process/logoutadmin.php" class="w3-bar-item w3-button  w3-right">
                 <i class="fa fa-sign-out  "></i>
             </a>

         </p>
     </header>